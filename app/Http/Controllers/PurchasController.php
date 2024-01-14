<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Purchas;
use Illuminate\Http\Request;

class PurchasController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.purchas.index', compact('customers'));
    }

    public function show($id){
        $customer = Customer::findOrFail($id);



        return view('admin.purchas.show' , compact('customer'));
    }
}
