<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {


        $data = $request->validated();



        //gestione slug
        $data['slug'] = Str::of($data['title'])->slug();
        //gestione immagine


        $img_path = $request->hasFile('cover_image') ? Storage::put('uploads', $data['cover_image']) : NULL;

        // $img_path = $request->hasFile('cover_image') ? $request->cover_image->store('uploads') : NULL;





        $post = new Post();

        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->slug = $data['slug'];
        $post->cover_image = $img_path;

        //$post->fill($data);
        $post->save();


        return redirect()->route('admin.posts.index')->with('message', 'Articolo creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $slug)
    public function show(Post $post)
    {

        // $post = Post::find($id); SELECT * FROM posts where id = $id LIMIT 1
        // $post = Post::where('slug', $slug)->first();

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // dd($request->all());

        $data = $request->validated(); //se non validate, redirect a risorsa precedente

        // $post->slug = Str::of($post->title)->slug();
        $data['slug'] = Str::of($data['title'])->slug();
        $img_path = $request->hasFile('cover_image') ? $request->cover_image->store('uploads') : NULL;


        // $post->title = $data['title'];
        // $post->content = $data['content'];
        // $post->slug = $data['slug'];


        $post->update($data);
        $post->cover_image = $img_path;
        $post->save();


        // $post->slug = $data['slug'];
        // $post->save();

        return redirect()->route('admin.posts.index')->with('message', $post->id . ' - Post aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        //se presente immagine, la cancello

        if ($post->cover_image) {
            //cancello immagine
            Storage::delete($post->cover_image);
        }


        //salviamo in maniera preventiva il post id
        $post_id = $post->id;
        //cancello record
        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', $post_id . ' - Post cancellato correttamente');
    }
}
