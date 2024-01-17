<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Purchas;
use App\Models\Shoping;
use Illuminate\Http\Request;
use Pusher\Pusher;

class ShopingController extends Controller
{
    public function AddCard($id)
    {

        $item = Item::findOrFail($id);

        $card = session()->get('card', []);


        if (isset($card[$id])) {
            $card[$id]['quantity']++;
        } else {
            $card[$id] = [
                'item_id'           => $item->id,
                'title'        => $item->title,
                'price'        => $item->discount($item->id),
                'quantity'     => 1,
                'discount'     => $item->discount,
                'image'        => $item->image ,

            ];
        }
        session()->put('card', $card);
        return redirect()->back()->with('success', 'تم اضافه المنتج لعربه التسوق');
    }

    public function ShowCard()
    {
        return view('shoping.show_item_cart');
    }

    public function customer_data()
    {
        return view('shoping.costomer_data');
    }

    public function store(Request $request, Customer $customer,  Purchas $purchas)
    {


        $this->validate($request, [
            'name'          => 'required',
            'phone_number'   => 'numeric',
            'country'       => 'required',
            'city'          => 'required',
            'details_address'   => 'required'
        ]);

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->phone_number = $request->phone_number;
        $customer->country = $request->country;
        $customer->city = $request->city;
        $customer->details_address = $request->details_address;
        $customer->save();


        foreach(session('card') as $item){

            $item['customer_id'] = $customer->id ;
            Purchas::insert($item);

            session()->forget('card');
            session()->flash('card');
        }
        return redirect()->route('home');

    }

    public function remove($id) {
        if($id) {
            $cart = session()->get('card');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('card', $cart);
            }
            return redirect()->back()->with('success', 'Product successfully removed!') ;
        }
    }
}
