<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view("users.create",['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:users,email',
            'password' => 'required|string|min:5',
            'roles' => 'required|array',
            'alias' => 'required|string',
            'account_no' => 'required|string',
            'company_name' => 'required|string',
            'manager' => 'required|string',
            'api' => 'required|string',

        ]) ;

        $user = User::create($request->all());
        $user->roles()->attach($request->input('roles'));

        return redirect()->route('users.index')->with('success','user created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        return view('users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        $roles = Role::all();
        return view('users.edit',['user'=>$user, 'roles' =>$roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // 'password' => 'required|string|min:5',
            'roles' => 'required|array',
            'alias' => 'required|string',
            'account_no' => 'required|string',
            'company_name' => 'required|string',
            'manager' => 'required|string',
            'api' => 'required|string',
        ]);
    
        $user->update($request->all());
        $user->roles()->sync($request->input('roles'));
    
        return redirect()->route('users.index')->with('success', 'User updated successfully');
        
    }
    // public function update(Request $request, $id){
    //     $user = User::find($id);

    //     $user->name = $request['name'];
    //     $user->email = $request['email'];
    //     $user->password = md5($request['password']);
    //     $user->save();

    //     return redirect('/users/view');
    // }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
    $user->delete();
      $user->roles()->detach();
      $user->delete();
        return redirect()->route('users.index')->with('success','deleted successfully');
    }

    
   
}
