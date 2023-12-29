<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Child;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $child ;
    public function __construct(Child $child){
        $this->child = $child ;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $category_id = $request->get('category_id');
        return view('admin.children.create' ,compact('category_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $data = $request->validate([
            'title' => 'required',
            'cover'=> 'image'
        ]);
        if ($request->hasFile('cover')){
            $file = $request->file('cover');
            $imageName = 'children/'.time().'.' . $file->getClientOriginalExtension() ;
            $file->move(public_path('images/children') , $imageName);
        }
        $data['cover'] = $imageName;
        $this->child->parent_id = $request->get('category_id');
        $category_id = Category::find($request->get('category_id'));
        $category_id->children()->create($data);
        session()->flash('flash_message' , 'تم الاضافه بنجاح');
        return redirect()->back();
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
    public function destroy(string $id)
    {
        //
    }
}
