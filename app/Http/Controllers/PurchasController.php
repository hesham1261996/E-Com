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

    public function update(Request $request , $id) {

        $order = Customer::find($id) ;

        $order->status_order = $request->status_order ;
        $order->save();

        return redirect()->back()->with('flash_message' , 'تم تعديل حاله الطلب');
    }

    public function delete($id){

        Customer::find($id)->delete();
        return redirect()->back()->with('flash_message' , 'تم حذف الطلب');

    }

    public function delete_item_cart($id){
        Purchas::find($id)->delete();
        return redirect()->back()->with('flash_message' , 'تم حذف المنتج');
    }
}
