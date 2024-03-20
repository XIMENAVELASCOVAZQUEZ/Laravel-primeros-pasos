<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\Post\StoreRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo "Index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $categories = Category::pluck('id', 'title');

       //dd($categories);

       //dd($categories[0]->title);
       echo view('dashboard.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(StoreRequest $request)
    {
        //echo request("title");
        //echo $request->input('slug');
        //dd($request->all());
        
        $validated = Validator::make($request->all(),StoreRequest::myRules());
        //dd($validated->fails());
        //dd($validated->fails());

        //dd(request("title"));
        //dd($request);

        //$validated = $request->validate(StoreRequest::myRules());
        //$request->validate(StoreRequest::myRules());

        $data = array_merge($request->all(),['image' => '']);

        dd($data);

        Post::create($data);
    }

    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
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
    public function destroy(Post $post)
    {
        //
    }
}
