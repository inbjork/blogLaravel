<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use Carbon\Carbon;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index(){

        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        
        $tags = Tag::all();
        $categories = Category::all();
        $tags = tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));

    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'excerpt' => 'required'
        ]);

        //return $request->all();
        $post = new Post;
        $post->title = $request->get('title');
        $post->url = str_slug($request->get('title'));
        $post->excerpt = $request->get('excerpt');
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->category_id = $request->get('category');
        $post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : null;
        $post->save();

        $post->tags()->attach($request->get('tags'));

        return back()->with('flash', 'Tu Publicacion ha sido Creada!! =)');

        $post->tags()->attach($request->get('tags'));
        return back()->with('flash', 'Tu publicacion ha sido creada');
    }
}
