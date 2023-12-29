<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Child;
use App\Models\Company;
use App\Models\Item;
use App\View\Components\Cover;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.items.index', compact('items'));
    }
    public function search(Request $request){
        $items = Item::where('title' ,'LIKE' ,"%$request->keyword%" )->get();
        return view('items.search' , compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Item $item)
    {
        $data = $request->validate([
            'title'             => 'required',
            'description'       => 'nullable',
            'category_id'       => 'required|integer',
            'child_id'          => 'required|integer',
            'number_of_copies'  => 'integer',
            'made_year'         => 'integer',
            'price'             => 'integer',
            'discount'          => 'integer',
            'image'             => ['required', 'mimes:jpg,jpeg,png,gif']
        ]);

        $image = $request->file('image');
        $image_name = 'items/' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/items'), $image_name);

        $data['image'] = $image_name;
        Item::create($data);
        session()->flash('flash_message', 'تم اضافه العنصر بنجاح');
        return redirect()->route('items.index', $item);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('admin.items.show' , compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::find($id);
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,Item $item)
    {
        $date = $request->validate([
            'title'             => 'required',
            'description'       => 'nullable',
            'category_id'       => 'required|integer',
            'child_id'          => 'integer',
            'number_of_copies'  => 'integer',
            'made_year'         => 'integer',
            'price'             => 'integer',
            'discount'          => 'integer',
            'image'             => ['mimes:jpg,jpeg,png,gif']
        ]);

        if($request->hasFile('image')){
            $path_imag = public_path('/image'.$item->image);
            if(file_exists($path_imag)){
                unlink($path_imag);
            }
            $image      = $request->file('image');
            $image_name = "items/".time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/items') , $image_name);

            $date['image'] = $image_name ;
        }

        $item->update($date);
        session()->flash('flash_message', 'تم تعديل العنصر بنجاح') ;
        return redirect()->route('items.index', $item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);

        $image_path = public_path('images/' . $item->image);

        if (file_exists($image_path)) {

            unlink($image_path);
        }

        $item->delete();

        session()->flash('flash_message', 'تم حذف العنصر');

        return redirect()->back();

    }

    public function itemByCat($category){
        $category = Category::find($category);
    
                return view('categories.show' , compact('category' ));
    }

    public function ItemByChild($child){
        
        $getChild = Child::find($child) ;

        return view('childrin_Cat.index' , compact('getChild'));

    }
}
