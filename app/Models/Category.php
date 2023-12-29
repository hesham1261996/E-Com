<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title' ,'description' , 'image'];
    public function companies(){
        return $this->belongsToMany(Company::class);
    }
    public function items(){
        return $this->hasMany(Item::class);
    }

    public function subCategory(){
        return $this->hasMany(SubCategories::class);
    }

    public function children(){
        return $this->hasMany(Child::class , 'parent_id');
    }

}
