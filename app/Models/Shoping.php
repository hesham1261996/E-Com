<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoping extends Model
{
    use HasFactory;
    protected $table = ['item_user'];

    public function customers_data(){
        return $this->belongsToMany(Customer::class , 'castomer_shoping');
    }

    public function items_to_card(){
        return $this->hasMany(Item::class, 'item_id');
    }

}
