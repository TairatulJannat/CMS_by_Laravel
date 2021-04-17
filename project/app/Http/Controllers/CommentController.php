<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    //
    public function store(Request $request, $post_id)
    {
        $this->validate($request,[
            'comment_body' => 'required',

        ]);
        $comment = new Comment([
            'post_id' => $post_id,
            'user_id' => auth()->user()->id,
            'comment_body'=> $request->get('comment_body'),
        ]);
        $comment->save();
        return Redirect::back()->with('success','Comment Created Successfully');

    }
}
