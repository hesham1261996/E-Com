<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $role ; 

    public function __construct(Role $role)
    {
        return $this->role = $role ;
    }
    public function index()
    {
        return view('admin.roles.all' , ['roles' => $this->role->all()]);
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
            'name' => 'required|max:50'
        ]);
        $this->role->role = $request->name ;
        $this->role->save();
        return back()->with('flash_message' , 'تم انشاء الدور');

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->role->find($id)->delete();
        return back()->with('flash_message' , 'تم حذف الدور');


    }


    public function getByRole(Request $data)
    {
        $permissions = $this->role::find($data->id)->permissions()->pluck('permission_id');

        return $permissions;
    }
}
