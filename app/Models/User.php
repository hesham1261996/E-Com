<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Item;
use App\Models\Comment;
use App\Models\Role;
use Illuminate\Auth\Access\Response;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function items(){
        return $this->belongsToMany(Item::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function isAdmin(){
        return $this->role_id  <= 2 ;
    }

    public function IsSuperAdmin() {
        return $this->role_id == 1 ;
    }

    public function hasAllow($permission){
        $role = $this->role()->first();
        return $role->permissions()->whereName($permission)->first()   ? true : false ;
    }

    public function ItemToCart(){
        return $this->belongsToMany(Item::class)->withPivot(['number_of_copies' , 'price','bought'])->wherePivot('bought' , false);
    }

    public function number_of_copies($id){
        return $this->belongsToMany(Item::class)->withPivot(['number_of_copies' , 'price','bought'])->wherePivot('item_id' , $id)->first()->number_of_copies;
    }


}

