<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
class Company extends Model
{
    use HasFactory;

    protected $fillable = [ 'name' , 'image' , 'description'];
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function items(){
        return $this->hasMany(Item::class);
    }
}
