<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index' , compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Category $category)
    {
        $data = $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'image'             => ['mimes:jpg,jpeg,png,gif']
        ]);
        if($request->hasFile('image')){

            $image = $request->file('image');
            $image_name = 'categories/' . time(). '.' .$image->getClientOriginalExtension();
            $image->move(public_path('images/categories') , $image_name);

            $data['image'] = $image_name;
        }
        $category->create($data) ;

        session()->flash('flash_message' , 'تم اضافه القسم بنجاح');
        return redirect()->route('categories.index' , $category);
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'image'         =>['image' , 'mimes:jpg,jpeg,png,gif']
        ]);

        if($request->hasFile('image') ){
            if($category->image != null){
                $image_path = public_path('images/'.$category->image );
                if(fileExists($image_path)){
                    unlink($image_path);
                }
            }
            $image = $request->file('image');
            $image_name = 'categories/'. time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categories') , $image_name);
            $data['image'] = $image_name;
        }
        $category->update($data);

        session()->flash('flash_message' , 'تم تعديل القسم');
        return redirect()->route('categories.index' , $category );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->image != null){
            $image_path = public_path('images/'. $category->image);
            if(fileExists($image_path)){
                unlink($image_path);
            }
        }
        $category->delete();
        session()->flash('flash_message' , 'تم حدف القسم');
        return redirect()->back();
    }

    public function allCaategory(){
        $categories = Category::all();
        $cover = null ;
        $title = __('الاقسام');
        return view('categories.index' , compact('categories' , 'cover' , 'title'));
    }
}
