<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Shoping;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addcart(Request $request){
        $item = Item::find($request->id);
        if(auth()->user()->ItemToCart->contains($item)){
            $newQuantity = $request->quantity + auth()->user()->ItemToCart()->where('item_id' , $item->id)->first()->pivot->number_of_copies ; 
            if($newQuantity > $item->number_of_copies){
                session()->flash('warinig_message' , 'لم يتم اضافه العنصر اقصي عدد يمكنك اضاقته هو' . $item->number_of_copies - auth()->user()->ItemToCart()->first()->pivot->number_of_copies );
            }else{
                
                auth()->user()->ItemToCart()->updateExistingPivot($item->id , ['number_of_copies'=> $newQuantity]);
                return redirect()->back();
            }
        }else{
            auth()->user()->ItemToCart()->attach($request->id ,["number_of_copies" => $request->quantity , 'price' => $item->price]);
            
        }
        $num_of_product = auth()->user()->ItemToCart()->count();
        return redirect()->route('home' , compact('num_of_product'));
    }

    public function show_cart(){
        
        $item_of_cart = auth()->user()->ItemToCart;
        $title = __('سله المشتريات');
        return view('shoping.show_item_cart' ,compact('item_of_cart' , 'title'));
    }
}
