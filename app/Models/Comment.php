<?php

namespace App\Models;
use App\Models\Item ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;
    public function commentable() : MorphTo
    {
        return $this->morphTo();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function replies(){
        return $this->hasMany(Comment::class , 'parent_id');
    }

}
