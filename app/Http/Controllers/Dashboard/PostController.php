<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $posts = Post::paginate(2);

        //dd($posts);
        return view('dashboard\post.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $categories = Category::pluck('id', 'title');

       $post = new Post();

       //dd($categories);

       //dd($categories[0]->title);
       echo view('dashboard\post.post.create',compact('categories','post'));
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

        //$data = array_merge($request->all(),['image' => '']);

        //dd($data);

        //$data = $request->validated();

        //$data['slug'] = Str::slug($data['title']);
        
        //dd($data);

        Post::create($request->validated());

        //return route("post.create");
        //return redirect("/post/create");
        //return redirect()->route("post.create");
        return to_route("post.index")->with('status', "Registro creado.");
    }

    /**
     * Display the specified resource.
     * 
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard\post.post.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');

        //dd($categories);
 
        //dd($categories[0]->title);
        echo view('dashboard\post.post.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if(isset($data["image"])) {
            //dd($request->image);
            //dd($request->validated()["image"])->hashName();
            //dd($request->validated()["image"])->getClientOriginalName();
            //dd($request->validated()["image"]->extension());

            $data["image"] = $filename = time().".".$data["image"]->extension();
            //dd($filename);

            $request->image->move(public_path("image/otro"),$filename);
        }

        $post->update($data);
        //$request->session()->flash('status', "Registro actualizado.");
        return to_route("post.index")->with('status', "Registro actualizado.");
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index")->with('status', "Registro eliminado.");
    }
}
