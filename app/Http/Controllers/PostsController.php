<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\category;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::paginate(5)->toJSON();
        $posts = json_decode($posts);
        // dd($posts);
        if($posts){
            $reponse = [
            'tablename' => 'posts',
             'data' => $posts,
            ];
           
        }
        else
        {
            $reponse = [
                'tablename' => 'posts',
            ];
        }
        // dd($reponse);
        return view('admin.table')->with('reponse', $reponse);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoies = category::all()->toJSON();
        $categoies = json_decode($categoies);
       
        return view('admin.post_layouts.create')->with('categoies', $categoies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostsRequest $request)
    {
        $request->validated();

        if(isset($request->image))
        {
        $newImageName = time().'-' .$request->title . '.' . $request->image->extension();
        // dd($newImageName);
        $request->image->move(public_path('assets/images/img_database'), $newImageName);

            $post = Posts::create([
                'id_u' => $request->id_u,
                'name' => $request->name,
                'title' => $request->title,
                'content' => $request->content,
                'image_path' => $newImageName,
                'category_id' => $request->category,
                ]);
            

        }
        else
        {
           $post = Posts::create([
            'id_u' => $request->id_u,
            'name' => $request->name,
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category,
            ]);
        }

        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        // dd($post->category);
        return view('admin.post_layouts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostsRequest  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request, $posts)
    {
        $request->validated();
        if(isset($request->image))
        {
        $newImageName = time().'-' .$request->title . '.' . $request->image->extension();
        // dd($newImageName);
        $request->image->move(public_path('assets/images/img_database'), $newImageName);
        $post = Posts::findOrFail($posts)
            ->update([
                'title' => $request->title,
                'name' => $request->name,
                'content' => $request->content,
                'image_path' => $newImageName,
            ]);
        }
        else 
        {
            $post = Posts::findOrFail($posts)
            ->update([
                'title' => $request->title,
                'name' => $request->name,
                'content' => $request->content,
            ]);
        }
        
        
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();
        return redirect('/admin/posts')->with('succes', 'Delete post successfully');
    }

    public function postapi()
    {
        $data = Posts::all();
        return ['data' => $data];
    }

}
