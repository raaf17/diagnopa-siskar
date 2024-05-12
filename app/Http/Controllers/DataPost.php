<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DataPost extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $posts = Posts::all();
        return view('dashboard_admin.posts.index', [
            'pageTitle' => 'Posts',
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard_admin.posts.tambah', [
            'pageTitle' => 'Buat Post Baru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'judul' => ['required', 'max:255'],
            'slug' => ['required','unique:posts'],
            'image' => ['image', 'file', 'max:1024'],
            'body' => ['required'],
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['admin_id'] = auth('admin')->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200,'....');

        Posts::create($validatedData);

        return redirect('/admin/dashboard/post')->with('success', 'Post baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {   
        $post = Posts::where('slug', $slug)->firstOrFail();
        return view('dashboard_admin.posts.show', [
            'pageTitle' => 'Edit Post',
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {   
        $post = Posts::where('slug', $slug)->firstOrFail();

        return view('dashboard_admin.posts.edit', [
            'pageTitle' => 'Edit Post',
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'judul' => ['required', 'max:255'],
            'image' => ['image', 'file'],
            'body' => ['required'],
        ];

        if($request->slug != $request->oldSlug){
            $rules['slug'] = ['required','unique:posts'];
        }

        
        $validatedData = $request->validate($rules);
        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('posts-image');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200,'....');

        Posts::where('id', $id)
            ->update($validatedData);

        return redirect('/admin/dashboard/post')->with('success', 'Post berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Posts::findOrFail($id);

        $post->delete();

        return redirect('admin/dashboard/post')->with('success', 'Data post berhasil dihapus');
    }

    public function checkSlug(Request $request){

        $slug = SlugService::createSlug(Posts::class, 'slug', $request->judul);

        return response()->json(['slug'=>$slug]);
    }
}
