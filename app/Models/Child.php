<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Item;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' , 'disc' , 'cover'
    ];

    public function category(){
        return $this->belongsTo(Category::class , 'parent_id');
    }

    public function items(){
        return $this->hasMany(Item::class , 'child_id');
    }
}
