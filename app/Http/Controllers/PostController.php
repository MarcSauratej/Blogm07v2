<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $posts = Post::where('user_id', $user->id)->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request);
        $post = new Post;
        $post->title=$request->title;
        $post->body=$request->body;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $path=Storage::putFile('public/images',$request->file('image'));
            $nuevo_path=str_replace('public/','',$path);
            $post->image_url = $nuevo_path;
        }
        $post['user_id'] = Auth::user()->id;
        //dd($post);
        //tags

        /*$tags = explode(',', $request->get('tag'));
        //dd($tags);

        $validatedData = $request->validate([
            'title' => 'required|max:225',
            'body' => 'required|max:225',
            'user_id' =>'required|min:1'
        ]);

        $createdPost = Post::create($validatedData);
        //dd($validatedData);
        foreach($tags as $tag) {
            $createdTag = Tag::create(['tag' => $tag,'post_id'=>$createdPost->id]);
            //dd($createdTag);
        }*/
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function view( $post)
    {
        $post= Post::find($post);
        return view('view', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post_id)
    {

            $post=Post::find($post_id);
            if($post->image_url){
                Storage::delete('public/'.$post->image_url);
            }
            $post->delete();
            return redirect()->route('posts.index');

    }
}
