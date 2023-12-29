<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Item;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function show($item){
        $comments = Item::find($item)->comments ;
        return view('items.details' ,compact('comments'));
    }
    public  function store(Request $request , Comment $comment){
        $this->validate($request , [
            'body' => 'required'
        ]);

        $comment->body = $request->get('body');
        $comment->user()->associate($request->user());
        $comment->item_id = $request->get('item_id');
        $item = Item::find($request->get('item_id'));
        $item->comments()->save($comment);
        return back()->with('success' , "تم التغليق بنجاخ");
     }
}
