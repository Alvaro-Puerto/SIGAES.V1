<?php

namespace App\Http\Controllers;

use App\Exports\TeacherExport;
use App\Models\Pensum;
use App\Models\SchoolYear;
use App\Models\Teacher;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'birth_date' => 'required',
            'gender' => 'required',
            'inss' => 'required',
           // 'inss' => 'required'
        ], [
            'first_name.required' => 'El primer nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
            'email.required' => 'El correo electronico es requerido',
            'email.unique' => 'Ya existe un correo electronico',
            'gender.required' => 'El sexo es requerido',
            
            'inss.required' => 'El INSS es requerido',
            'birth_date.required' => 'La fecha de nacimiento es requerida',
            
        ]);
        $data = $request->all();
       
        $data['password'] = bcrypt('secret');
        $data['name'] = $request->first_name . ' ' . $request->last_name;
        $user = User::create($data);

        if($request->file) {
            $path = $request->file('file')->store('student_picture');
            $user->picture = $path;
        }
        
        $user->save();

        $user->teacher()->create($data);
        return redirect('/teacher');
    }

    public function index() {
        $teachers = Teacher::paginate(15);

        foreach($teachers as $user) {
            $user->user;
        }
        return view('teacher-list', ['teachers' => $teachers]);
    }

    public function detail($id) {
        $teacher = Teacher::find($id);
        $user = $teacher->user;
        
        $result = DB::table('pensums')
            ->join('pensum_matters', 'pensums.id', '=', 'pensum_matters.pensum_id')
            ->join('pensum_matter_teachers', 'pensum_matters.id', '=', 'pensum_matter_teachers.pensum_matter_id')
            ->join('school_years', 'pensums.school_year_id', '=', 'school_years.id')
            ->where('pensum_matter_teachers.teacher_id', '=', $id)
            ->select('school_years.id','school_years.name',  'school_years.start_at',  'school_years.end_at')
            ->groupBy(  'school_years.id',
                        'school_years.name', 
                        'school_years.start_at',
                        'school_years.end_at'
            )->paginate(5);

        $school_year_active = SchoolYear::where('status', true)->limit(1)->get();
        $school_year = SchoolYear::all();
        
        return view('teacher_detail')
                    ->with([    'teacher' => $teacher, 
                                'pensums' => $result,
                                'events' => $this->getEvent($user->id, $school_year_active[0]->id),
                                'school_year' => $school_year
                            ]);
    }

    public function updatePhoto(Request $request) {
        $user = Teacher::find($request->id)->user;
       
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
      $path = $request->file('file')->store('student_picture');
      $user->picture = $path;
      $user->save();
    
      return back($status = 302);
    
    }

    public function report() {
        return Excel::download(new TeacherExport, 'teachers.xlsx');
    }

    public function search($name) {
        $username = $name;
        error_log($name);
        $teachers = Teacher::whereHas('user', function ($query) use ($username){
            $query->where('first_name', 'like', "%{$username}%");
        })->get();

        foreach ($teachers as $teacher ) {
            $teacher->user;
        }

        return response()->json($teachers);
    }

    public function update($id) {

        $teacher = Teacher::find($id);
        return view('teacher_update', ['teacher' => $teacher]);
    }

    public function put(Request $request) {
        $teacher = Teacher::find($request->id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'inss' => 'required',
           
        ], [
            'first_name.required' => 'El primer nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
            'email.required' => 'El correo electronico es requerido',
            'email.unique' => 'Ya existe un correo electronico',
            'gender.required' => 'El sexo es requerido',
            'inss.required' => 'El codigo es requerido',
            
            'birth_date.required' => 'La fecha de nacimiento es requerida',
           
        ]);

        $teacher->inss = $request->inss;
        $teacher->general_observation = $request->general_observation;
        $teacher->save();

        $user = $teacher->user;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->save();
        return Response()->redirectTo('/teacher');

        
    }
    
    public function getEventByClycle($user_id, $ciclo) {
        return response()->json($this->getEvent($user_id, $ciclo));
    }

    private function getEvent($user_id, $ciclo) {
        $user = User::find($user_id);
        return  $events = $user->events()->where('school_year_id',$ciclo)->get();
    }
}
