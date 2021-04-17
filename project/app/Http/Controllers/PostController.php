<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Category;
use App\Http\Controllers\Auth;
class PostController extends Controller
{
    //
    public function show(Post $post){
        $comments = $post->comments;
        $likes = $post->likes;
        $user = Auth()->user()->id;
        $likes_user = Like::where('post_id', $post->id)->where('user_id', $user)->first();
        if($likes_user == null){
            $like_status = 0;
        }else{
            $like_status = 1;
        }
        return view('blog-post',['post'=>$post,'comments'=>$comments,'likes'=> $likes, 'like_status' => $like_status]);
    } 

    public function create(){
        $categories =Category::all();
        return view('admin.posts.create',['categories'=>$categories]);
    }
    public function store(){
       $inputs = request()->validate([
           'title'=> 'required|min:8|max:225',
           'post_image'=>'file',
           'category_id'=>'required',
           'body'=>'required'
       ]);
       if(request('post_image')){
           $inputs['post_image'] = request('post_image')->store('images');
       }
       auth()->user()->posts()->create($inputs);
       return back();
    }
    public function index(){
        return view('admin.posts.index');
    }

    public function view_all_post(){
        $user_id = auth()->id();
        $posts = Post::whereUserId($user_id)->get();
        return view('admin.posts.view_all_post',['posts'=>$posts]);
    } 
    public function view_all_users_post(){
        $posts = Post::all();
        return view('admin.posts.view_all_post',['posts'=>$posts]);
    }
    public function update_post($post_id){
        $post= Post::find($post_id);
        return view('admin.posts.update',['post'=>$post]);
    }
    public function update(Request $request, $post_id){
        $post= Post::find($post_id);
        $this->validate($request,[
            'title'=> 'required',
            'body'=>'required'
        ]);
        $post->update($request->all());
        return redirect()->route('user.posts');
    }
    public function delete($post_id){
        $post= Post::find($post_id);
        $post->delete();
        return redirect()->route('user.posts');
        
    }

    public function search(Request $request){
        $search = $request['search'];
        $posts = Post::where('title', 'LIKE' ,"%$search%")->get();
        // dd($posts);
        return view('home',['posts'=>$posts]);
    }
}
