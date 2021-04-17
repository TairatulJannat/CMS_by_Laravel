<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{
    //
    public function liked_post($post_id){
        $like = new Like([
         'post_id' => $post_id,
         'user_id' => auth()->user()->id,
        ]);
        $like->save();
        return Redirect::back();

    }
   public  function unliked_post($post_id){
       $user= Auth()->user()->id;
       $data = Like::wherePostId($post_id)->whereUserId($user);

       $data->delete();
       return Redirect::back();
   }
}
