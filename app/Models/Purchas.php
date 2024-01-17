<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Customer;

class Purchas extends Model
{
    protected $fillable = ['title' , 'price' , 'discount','quantity' , 'image' , 'status_order'];
    use HasFactory;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
