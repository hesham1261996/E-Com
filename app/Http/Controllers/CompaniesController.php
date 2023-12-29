<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();

        return view('admin.companies.index' , compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Company $company)
    {
        $data = $request->validate([
            'name'          => 'required' ,
            'descriptiopn'  => 'nullable',
            'image'         =>['image' , 'mimes:jpg,jpeg,png,gif']
        ]);

        if($request->file('image')){

            $imag = $request->file('image');
            $image_name = 'companies/' . time() . '.' . $imag->getClientOriginalExtension();
    
            $imag->move(public_path('images/companies') , $image_name);
            $data['image'] = $image_name ;
        }

        $company->create($data);

        session()->flash('flash_message' , 'تم اضافه الشركه');
        
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit' , compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name'         => 'required',
            'description'   => 'required',
            'image'         =>['image' , 'mimes:jpg,jpeg,png,gif']
        ]);

        if($request->hasFile('image') ){
            if($company->image != null){
                $image_path = public_path('images/'.$company->image );
                if(fileExists($image_path)){
                    unlink($image_path);
                }
            }
            $image = $request->file('image');
            $image_name = 'companies/'. time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/companies') , $image_name);
            $data['image'] = $image_name;
        }
        $company->update($data);

        session()->flash('flash_message' , 'تم تعديل الشركه');
        return redirect()->route('companies.index' , $company );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if($company->image != null){
            $image_path = public_path('images/'. $company->image);
            if(fileExists($image_path)){
                unlink($image_path);
            }
        }
        $company->delete();
        session()->flash('flash_message' , 'تم حدف القسم');
        return redirect()->back();
    }
}
