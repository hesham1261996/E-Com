<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Shoping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item_of_cart = auth()->user()->ItemToCart;
        return view('shoping.create_client_date', compact('item_of_cart'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Customer $customer)
    {
        dd(DB::table('item_user')->select(['id' , 'user_id' , 'item_id' ,])->distinct()->get());
        $date = $request->validate([
            'name'              => 'required',
            'phone_number'      =>  'numeric' ,
            'country'           => 'required',
            'city'              =>  'required',
            'details_address'   => 'required'
        ]);
        $customer->create($date);
        return view('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
