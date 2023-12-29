<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public $permission ;
    public function __construct(Permission $permission)
    {
        return $this->permission = $permission; 
    }
    public function index(){

        $permissions= $this->permission->all()  ;
        $roles = Role::all() ;
        return view('admin.permissions.index' , compact('permissions','roles' ));
    }


    public function store(Request $request){
        
        Role::find($request->role_id)->permissions()->sync($request->permission);
        return back()->with('flash_message' , 'تم تعديل الصلاحيات');
    }
}
