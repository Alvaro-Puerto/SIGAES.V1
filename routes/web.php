<?php

use App\Models\Enrollement;
use App\Models\EnrollementMatter;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/search/student', [App\Http\Controllers\SearchController::class, 'search_student']);
Route::post('/search/tutor', [App\Http\Controllers\SearchController::class, 'search_tutor']);

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	#Route Student
	Route::get('student', ['as' => 'student.list', 'uses'=>'App\Http\Controllers\StudentController@index']);
	Route::get('student/create', function () {return view('student_form');});
	Route::get('student/detail/{id}', ['as' => 'student.detail', 'uses'=>'App\Http\Controllers\StudentController@detail']);
	Route::post('student/create', ['as' => 'student.create', 'uses'=>'App\Http\Controllers\StudentController@create']);
	Route::post('student/update/photo', ['as' => 'student.picture', 'uses' => 'App\Http\Controllers\StudentController@updatePhoto']);
	Route::get('student/export', ['as' => 'student.export', 'uses' => 'App\Http\Controllers\StudentController@export']);
	#SchoolRoutes
	Route::get('school/setting', ['as' => 'school.setting', 'uses' => 'App\Http\Controllers\SchoolInformationController@index']);
	Route::post('school/create', ['as' => 'school.create', 'uses'=>'App\Http\Controllers\SchoolInformationController@create']);

	#SchoolCourse
	Route::get('school/courses', ['as' => 'school.courses', 'uses' => 'App\Http\Controllers\CourseController@index']);
	Route::get('school/courses/new', function() {return view('new_course');})->name('school.courses.new');
	Route::post('school/courses/new', ['as' => 'school.course.new', 'uses' => 'App\Http\Controllers\CourseController@create']);
	Route::delete('school/courses/{id}', ['as' => 'school.course.delete', 'uses' => 'App\Http\Controllers\CourseController@delete']);
	Route::get('school/courses/update/{id}', ['as' => 'school.course.update', 'uses' => 'App\Http\Controllers\CourseController@update']);

	#SchoolTurn
	Route::get('school/turns', ['as' => 'school.turns', 'uses' => 'App\Http\Controllers\TurnController@index']);
	Route::get('school/turn/new', function() {return view('new_turn');})->name('school.turns.new');
	Route::post('school/turn/new', ['as' => 'school.turn.new', 'uses' => 'App\Http\Controllers\TurnController@create']);
	Route::get('school/turn/update/{id}', ['as' => 'school.turn.update', 'uses' => 'App\Http\Controllers\TurnController@update']);
	Route::delete('school/turn/{id}', ['as' => 'school.turn.delete', 'uses' => 'App\Http\Controllers\TurnController@delete']);
	
	#Teacher
	Route::get('teacher/new', function() {return view('teacher-new');});
	Route::post('teacher/new', ['as' => 'teacher.all', 'uses' => 'App\Http\Controllers\TeacherController@index']);
	Route::get('teacher/', ['as' => 'teacher.all', 'uses' => 'App\Http\Controllers\TeacherController@index']);
	Route::post('teacher/create', ['as' => 'teacher.create', 'uses' => 'App\Http\Controllers\TeacherController@create']);
	Route::get('teacher/detail/{id}', ['as' => 'teacher.detail', 'uses'=>'App\Http\Controllers\TeacherController@detail']);
	Route::get('teacher/export', ['as' => 'teacher.export', 'uses' => 'App\Http\Controllers\TeacherController@report']);
	Route::get('teacher/search/{name}', ['as' => 'teacher.search', 'uses' => 'App\Http\Controllers\TeacherController@search']);
	#Matter //Asignaturas
	Route::get('matter/new', function() {return view('new_matter');});
	Route::post('matter/new', ['as' => 'matter.new', 'uses' => 'App\Http\Controllers\MatterController@create']);
	Route::get('matters', ['as' => 'matter.list', 'uses' => 'App\Http\Controllers\MatterController@get']);
	Route::get('matter/detail/{id}', ['as' => 'matter.detail', 'uses' => 'App\Http\Controllers\MatterController@detail']);
	Route::delete('matter/{id}', ['as' => 'matter.delete', 'uses' => 'App\Http\Controllers\MatterController@delete']);
	Route::get('matter/update/{id}', ['as' => 'matter.update', 'uses' => 'App\Http\Controllers\MatterController@update']);
	
	#Matter Teacher //Maestros asignaturas
	Route::get('matter/teacher/{id}', ['as' => 'matter.teacher', 'uses' => 'App\Http\Controllers\MatterTeacherController@get']);
	Route::put('matter/teacher/assign', ['as' => 'matter.teacher-assign', 'uses' => 'App\Http\Controllers\MatterTeacherController@attach']);
	Route::delete('matter/teacher/revoke', ['as' => 'matter.teacher-remoke', 'uses' => 'App\Http\Controllers\MatterTeacherController@dettach']);

	#School Year
	Route::get('school/year', ['as' => 'year.list', "uses" => 'App\Http\Controllers\SchoolYearController@get']);
	Route::get('school/year/new', function() {return view('school_year_new');})->name('school.year.new');
	Route::post('school/year/new', ['as' => 'year.new', "uses" => 'App\Http\Controllers\SchoolYearController@create']);
	Route::get('school/year/detail/{id}', ['as' => 'year.config', "uses" => 'App\Http\Controllers\SchoolYearController@detail']);
	Route::get('school/year/update/{id}', ['as' => 'year.update', "uses" => 'App\Http\Controllers\SchoolYearController@update']);
	Route::delete('school/year/{id}', ['as' => 'year.delete', "uses" => 'App\Http\Controllers\SchoolYearController@delete']);
	
	#Semester
	Route::get('school/semester/{id}/new', function($id) {return view('semester_new', ["id" => $id]);})->name('semester.new');
	Route::post('school/semester/new',  ['as' => 'semester.create', "uses" => 'App\Http\Controllers\SemesterController@create']);
	Route::post('school/semester/partial/new', ['as' => 'semester.partial.create', 'uses' => 'App\Http\Controllers\PartialController@create']);
	Route::delete('semester/{id}', ['as' => 'semester.delete', 'uses' => 'App\Http\Controllers\SemesterController@delete']);
	Route::get('semester/update/{id}', ['as' => 'semester.update', 'uses' => 'App\Http\Controllers\SemesterController@update']);
	
	Route::get('school/semester/{id}/list/partial', function ($id) {
		$semester = Semester::find($id);
		return view('semester_partial_list', ["semester" => $semester]);
	})->name('semester.partial.list');
	Route::get('school/semester/{id}/list/partial/new', function ($id) {
		$semester = Semester::find($id);
		return view('new_partial', ["id" => $id, 'semester' => $semester]);
	})->name('semester.partial.new');
	Route::delete('partial/{id}', ['as' => 'partial.delete', 'uses' => 'App\Http\Controllers\PartialController@delete']);	
	Route::get('partial/update/{id}', ['as' => 'partial.update', 'uses' => 'App\Http\Controllers\PartialController@update']);	

	#Enrollement
	Route::get('enrollement/{id}', ['as' => 'enrollement.new', "uses" => 'App\Http\Controllers\EnrollementController@get']);
	Route::get('enrollement/matter/{id}', ['as' => 'enrollement.matter', "uses" => 'App\Http\Controllers\EnrollementController@getAllMatter']);
	Route::post('enrollement/', ['as' => 'enrollement.create', "uses" => 'App\Http\Controllers\EnrollementController@create']);
	Route::delete('enrollement/{id}', ['as' => 'enrollement.delete', "uses" => 'App\Http\Controllers\EnrollementController@delete']);
	Route::post('enrollement/matter/asign', ['as' => 'enrollement_matter.asing', 'uses' => 'App\Http\Controllers\EnrollementMatterController@attachMatter']);
	Route::post('enrollement/matter/detach', ['as' => 'enrollement_matter.detach', 'uses' => 'App\Http\Controllers\EnrollementMatterController@detachMatter']);
	Route::get('enrollement/{id}/detail', ['as' => 'enrollement.detail', 'uses' => 'App\Http\Controllers\EnrollementController@detail']);

	#Modality
	Route::get('school/modality', ['as' => 'modality.list', "uses" => 'App\Http\Controllers\ModalityController@get']);
	Route::delete('school/modality/{id}', ['as' => 'modality.delete', "uses" => 'App\Http\Controllers\ModalityController@delete']);
	Route::post('school/modality', ['as' => 'modality.create', "uses" => 'App\Http\Controllers\ModalityController@store']);
	Route::get('school/modality/update/{id}', ['as' => 'modality.update', "uses" => 'App\Http\Controllers\ModalityController@update']);
	Route::get('school/modality/new', function() {return view('modality_new');})->name('modality.new');

	#Level
	Route::get('school/level', ['as' => 'level.list', "uses" => 'App\Http\Controllers\LevelController@get']);
	Route::delete('school/level/{id}', ['as' => 'level.delete', "uses" => 'App\Http\Controllers\LevelController@delete']);
	Route::post('school/level', ['as' => 'level.create', "uses" => 'App\Http\Controllers\LevelController@store']);
	Route::get('school/level/new', function() {return view('level_new');})->name('level.new');
	Route::get('school/level/update/{id}', ['as' => 'level.update', "uses" => 'App\Http\Controllers\LevelController@update']);
	Route::get('tutor/list', ['as' => 'tutor.list',  "uses" => 'App\Http\Controllers\ParentStudentController@get']);
	Route::get('tutor/new', function() {return view('new_parent');})->name('tutor.create');
	Route::post('tutor/new', ['as' => 'tutor.new', "uses" => 'App\Http\Controllers\ParentStudentController@create']);
	Route::get('tutor/select/{id}', function($id) { return view('tutor_preview_selection', ['id' => $id]);})->name('tutor.select');
	Route::get('tutor/select/{id}/parent', function($id) { return view('tutor_select_search', ['id' => $id]);})->name('tutor.search');
	Route::get('tutor/select/{id_student}/{id_tutor}/confirm', ['as' => 'level.preview', "uses" => 'App\Http\Controllers\ParentStudentController@getPreview']);
	Route::post('tutor/asign/student', ['as' => 'tutor.asign', "uses" => 'App\Http\Controllers\ParentStudentController@asignStudent']);
	Route::delete('tutor/{id_tutor}/detach/student/{id_student}', ['as' => 'tutor.detach', "uses" => 'App\Http\Controllers\ParentStudentController@removeStudent']);

	#Calendar
	Route::get('calendar',  ['as' => 'event.index', "uses" => 'App\Http\Controllers\EventController@index']);
	Route::get('calendar/{course_id}/{school_year_id}',  ['as' => 'event.all', "uses" => 'App\Http\Controllers\EventController@getEventByAjax']);
	
	#Pensum
	Route::get('course/{id}/pensum', ['as' => 'course.pensum', "uses" => 'App\Http\Controllers\PensumController@detail']);
	Route::get('course/{id}/pensum/new', ['as' => 'course.pensum.new', "uses" => 'App\Http\Controllers\PensumController@pensumCreateStep1']);
	Route::post('course/{id}/pensum/new', ['as' => 'course.pensum.create', "uses" => 'App\Http\Controllers\PensumController@pensumCreateStep1Post']);
	Route::get('course/{id}/pensum/{id_pensum}/matter', ['as' => 'course.pensum.matter', "uses" => 'App\Http\Controllers\PensumController@pensumCreateStep2']);
	Route::post('course/pensum/matter', ["uses" =>  'App\Http\Controllers\PensumController@pensumCreateStep2Post']);
	Route::post('course/pensum/matter/detach', ['as' => 'course.pensum.matter.detach', 'uses' => 'App\Http\Controllers\PensumMatterController@detach']);
	Route::post('course/pensum/matter/teacher/detach', ['as' => 'course.pensum.matter.teacher.detach', 'uses' => 'App\Http\Controllers\PensumMatterController@detachTeacher']);
	Route::get('course/pensum/{id}/finish', ['as' => 'course.pensum.finish', "uses" =>  'App\Http\Controllers\PensumController@pensumCreateStep3']);
	Route::get('pensum/{id}', ['as' => 'pensum.detail', "uses" =>  'App\Http\Controllers\PensumController@pensumDetail']);
	#Partial
	Route::get('matter/partial/{id}/{id_enrollement}/update', function ($id, $id_enrollement) {
		$student = Enrollement::find($id_enrollement)->student;
		$enrollement_matter = EnrollementMatter::find($id);
		$matter = $enrollement_matter->matter;
		$data = ['student' => $student, 'matter' => $matter, 'enrollement_matter' => $enrollement_matter ];
		return view('partial_matter_form', $data);
	})->name('partial.matter.update');
	Route::post('matter/partial', ['as' => 'matter.partial.asign', 'uses' => 'App\Http\Controllers\EnrollementMatterPartialController@asignCalification']);

	#Error Page
	Route::get('error/information/school/not_found', function () {
		return view('error_page_initial');
	});
});

