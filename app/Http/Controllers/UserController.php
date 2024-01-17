<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index' , compact('users' , 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required|max:50',
            'email' => 'email|required',
        ]);
        $user = new User ;
        $user->name = $request->name ;
        $user->email = $request->email ;
        $user->role_id = $request->role_id ;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('message_flash' , 'تم اضافه المستخدم');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request , [
            'role_id' => 'required'
        ]);
         $user->role_id = $request->role_id;

        $user->save();

        session()->flash('flash_message', 'تم تعديل صلاحيات المستخدم بنجاح');
        return redirect(route('users.index'));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
