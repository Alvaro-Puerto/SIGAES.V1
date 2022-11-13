<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = Role::findById($request->role_id, null);
        foreach($request->permission as $permission) {
            $permission = Permission::findById($permission);
            $rol->givePermissionTo($permission);
        }
       

        return response()->json('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $roles = Role::find($id);
        $permissions = Permission::all();
        
        $data = [
          'rol' => $roles,
          'permissions' => $permissions  
        ];
        return View('permisions/config_roles', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $role = Role::findById($id, null);
       
        foreach($request->permission as $permission) {
            $permission = Permission::findById($permission);
            $role->revokePermissionTo($permission);
        }
        

        return response()->json('ok');
    }

    public function addUser(Request $request) {
        $role = Role::findById($request->role_id, null);
        foreach($request->users as $item) {
            $user = User::find($item['id']);
            $user->assignRole($role);
        }

        return response()->json('ok');
    }

    public function removeUser(Request $request) {
        $role = Role::findById($request->role_id, null);
        $user = User::find($request->user);
        $user->removeRole($role);
        return Redirect::back();
    }
}
