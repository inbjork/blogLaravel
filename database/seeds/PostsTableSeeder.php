<?php

use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();
        Category::truncate();
        Tag::truncate();

        $tag = new tag;
        $tag->name = "Etiqueta1";
        $tag->save();

        $tag = new tag;
        $tag->name = "Etiqueta2";
        $tag->save();

        $category = new category;
        $category->name = "Categoria1";
        $category->save();

        $category = new category;
        $category->name = "Categoria2";
        $category->save();

        $post = new Post;
        $post->title = "mi primer post";
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>cuerpo de mi primer post</p>";
        $post->category_id = 1;
        $post->published_at = Carbon::now()->subDays(4);
        $post->save();

        $post = new Post;
        $post->title = "mi segundo post";
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>cuerpo de mi segundo post</p>";
        $post->category_id = 2;
        $post->published_at = Carbon::now()->subDays(3);
        $post->save();

        $post = new Post;
        $post->title = "mi tercer post";
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>cuerpo de mi tercer post</p>";
        $post->category_id = 1;
        $post->published_at = Carbon::now()->subDays(2);
        $post->save();

        $post = new Post;
        $post->title = "mi cuarto post";
        $post->excerpt = "Extracto de mi cuarto post";
        $post->body = "<p>cuerpo de mi cuarto post</p>";
        $post->category_id = 2;
        $post->published_at = Carbon::now();
        $post->save();
    }
}
