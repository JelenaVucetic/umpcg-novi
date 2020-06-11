<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\PostView;
use Illuminate\Support\Facades\Auth;
use DB;
use Image;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(500);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required|max:70',
            'body' => 'required',
            'date' => 'required',
            'cover_image' => 'required|nullable|max:1999',
            'category' => 'required'
        ]);
    /*     // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

            $img = Image::make(storage_path('storage/cover_images' . $fileNameToStore))->resize(400, 150, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
            
        } else {
            $fileNameToStore = 'noimage.jpg';
        } */

        if($request->hasFile('cover_image')) {

            $photo = $request->file('cover_image');
            //get filename with extension
            $filenamewithextension = $request->file('cover_image')->getClientOriginalName();
     
            //Get just filename
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
     
            //Upload File
            $request->file('cover_image')->storeAs('public/cover_image', $filenametostore);
            $request->file('cover_image')->storeAs('public/cover_image/thumbnail', $filenametostore);
     
            //Resize image here
            $thumbnailpath = public_path('storage/cover_image/thumbnail/'.$filenametostore);
            $img = Image::make($photo->getRealPath())->resize(500, null , function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
    
        }
        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->date = $request->input('date');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenametostore;
        $post->category = $request->category;
        $post->save();
        return redirect('/')->with('success', 'Članak je uspješno kreiran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $post->increment('views');
        $posts = Post::orderBy('created_at','desc')->paginate(500);
        $posts->map(function ($post) {
            $post->title = substr($post->title , 0, 50);
        });
        return view('posts.show', compact('post', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        
        //Check if post exists before deleting
        if (!isset($post)){
            return redirect('/')->with('error', 'No Post Found');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'date' => 'required'
        ]);
		$post = Post::find($id);
                
        if($request->hasFile('cover_image')) {
            $photo = $request->file('cover_image');
            //get filename with extension
            $filenamewithextension = $request->file('cover_image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('cover_image')->storeAs('public/cover_image', $filenametostore);
            $request->file('cover_image')->storeAs('public/cover_image/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/cover_image/thumbnail/'.$filenametostore);
            $img = Image::make($photo->getRealPath())->resize(500, null, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
        }

        // Update Post
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->date = $request->input('date');
        $post->category = $request->category;
        if($request->hasFile('cover_image')){
            $post->cover_image = $filenametostore;
        }
        $post->save();

        return redirect('/')->with('success', 'Članak je uspješno izmjenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::find($request->post_id);
        //Check if post exists before deleting
        if (!isset($post)){
            return redirect('/')->with('error', 'Nije pronađen post');
        }

        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
        return back()->with('success', 'Članak je uspješno obrisan.');
    }
}
