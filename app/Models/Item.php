<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use App\Models\Child;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image' ,
        'child_id' ,
        'category_id' ,
        'description',
        'made_year',
        'number_of_capies',
        'price',
        'discount'
    ];

    public function category(){

        return $this->belongsTo(Category::class , 'category_id');
    }

    public function company(){
        return $this->belongsTo(Company::class , 'company_id');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function childCategory(){
        return $this->belongsTo(Child::class , 'child_id');
    }
    public function comments() : MorphMany
    {
        return $this->morphMany(Comment::class , 'commentable')->whereNull('parent_id');
    }

    public function discount($item_id){
        $item = Item::find($item_id) ;

        $discount = number_format($item->price - ( $item->price * $item->discount ) / 100 ) .'L.E';
        return  $discount;
    }
}
