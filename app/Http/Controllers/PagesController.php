<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\category;
use Illuminate\Support\Facades\Redis;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
       
        $posts = Posts::orderBy('id', 'DESC')->get();//->take(5);
        
        return view('pages.index')->with('posts', $posts);
    }

    public function blog()
    {
        $storage = Redis::connection();
        $popular = $storage->zREVRange('postViews', 0 , 3);
        $popularPosts = [];
        foreach ($popular as $value)
        { 

            $id= str_replace('post:','',$value);
            $popularPosts[$id] = $storage->get('post'.$id.'view');
        }

        $comments = [];
        $post_cmt = Posts::all();
        foreach ($post_cmt as $post)
        {
           $comments[$post->id] = $post->comments; 
        }
        $posts = Posts::orderBy('id', 'DESC')->paginate(4)->toJson();
        $posts = json_decode($posts);
        $categories = category::all();

        $reponse = [
            'posts' => $posts,
            'categories' => $categories,
            'comments' => $comments,
            'popularposts' => $popularPosts,
            'post_cmt' => $post_cmt,
        ];
        // dd($reponse);
        return view('pages.blog')->with('reponse', $reponse);
    }

    public function show($id)
    {
        $this->id = $id;
        $storage = Redis::Connection();

        if($storage->Zscore('postViews', 'post'.$id))
        {
            $storage->pipeline(function ($pipe)
            {
                $pipe->zIncrBy('postViews', 1, 'post:'.$this->id);
                $pipe->incr('post'.$this->id.'view');
            });
        }
        else
        {
            $view = $storage->incr('post'.$id.'view');
            $storage->zIncrBy('postViews', 1, 'post:'.$id);
        }
            $view = $storage->get('post'.$id.'view');
        

        
        // dd($popularPosts);
        $post = Posts::findOrFail($id);
        // dd($post->comments);
        return view('pages.blog-detail')->with('post', $post);
    }

    // public function category_post($category)
    // {
    //     $post_cmt = Posts::all();
    //     foreach ($post_cmt as $post)
    //     {
    //        $comments[$post->id] = $post->comments; 
    //     }
    //     $posts = Posts::where('category_id', '=',  $category)
    //                     ->orderBy('id', 'DESC')
    //                     ->paginate(4)
    //                     ->toJson();
    //     $posts = json_decode($posts);
    //     $categories = category::all();
    //     $reponse = [
    //         'posts' => $posts,
    //         'categories' => $categories,
    //         'comments' => $comments,
    //     ];
    //     // dd($reponse);
    //     return view('pages.blog')->with('reponse', $reponse);
    // }
}
