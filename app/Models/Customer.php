<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'phone_number',
        'country',
        'city',
        'details_address'
    ];
    
    public function shoping(){
        return $this->belongsToMany(Shoping::class , 'customer_shoping');
    }
}
