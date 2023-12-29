<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Child;
use App\Models\Company;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $number_of_categories   = Category::count();
        $number_of_items        = Item::count();
        $number_of_children    = Child::count();
        $number_of_users        = User::count();

        return view('admin.index' , compact('number_of_categories' , 'number_of_items' ,'number_of_children' , 'number_of_users'));
    }
}
