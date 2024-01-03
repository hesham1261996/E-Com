<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ShopingController extends Controller
{
    public function AddCard($id){

        $item = Item::findOrFail($id);

        $card = session()->get('card' , []);


        if(isset($card[$id])){
            $card[$id]['quantity']++ ;
        }else{
            $card[$id] = [
            'id'    => $item->id,
            'title' => $item->title ,
            'description'  => $item->description ,
            'price'        => $item->discount($item->id), 
            'quantity'     => 1 , 
            'discount'     =>$item->discount ,
            'image'        =>$item->image 
            ];
        }
        session()->put('card' , $card);
        return redirect()->back()->with('success' , 'تم اضافه المنتج لعربه التسوق') ;

    }

    public function ShowCard(){
        return view('shoping.show_item_cart');
    }
}
