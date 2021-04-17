<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('admin.roles.view_all_role',['roles'=> $roles]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $inputs = request()->validate([
            'name'=>'required',
            'slug'=>'required'
          ]);
          $role = new Role($inputs);
          $role->save();
          return redirect()->route('role.index');
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
        $role =Role::find($id);
        return view('admin.roles.edit',['role'=>$role]);
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
        $role = Role::find($id);
        $this->validate($request,[
             'name'=>'required',
             'slug'=>'required'
           ]);
           $role->update($request->all());
           return redirect()->route('role.index');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role.index');
       
    }
    public function users_role_manage()
    {
      $users = User::all();
     return view('admin.roles.user_role_manage', ['users'=>$users]);


    }
    public function add_users_role($id){
      $user = User::find($id);
    $roles = Role::all();
    return view('admin.roles.add_user_role',['user'=>$user,'roles'=>$roles]);
    }
    public function user_role_created(Request $request,$id){
        $user = User::find($id);
     $request_role_id=$_POST['role_id'];
     $user->roles()->attach($request_role_id);
      return redirect()->route('role.manage');
      }
      public function delete_users_role($id){
         $user =User::find($id);
         $roles= $user->roles;
         return view('admin.roles.delete_user_role',['roles'=>$roles,'user'=>$user]);
      }
      public function user_role_deleted(Request $request,$id){
          $user = User::find($id);
          $request_role_id=$_POST['role_id'];
          $user->roles()->detach($request_role_id);
          return redirect()->route('role.manage');
      }
}
