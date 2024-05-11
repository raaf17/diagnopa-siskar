<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DataGejala extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $gejala = Gejala::all();   

        return view('dashboard_admin.gejala.index', [
            'pageTitle' => 'Data Gejala',
            'gejala' => $gejala
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard_admin.gejala.tambah', [
            'pageTitle' => 'Tambah Gejala'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rulesValidation = $request->validate([
            'nama' => ['required', 'max:255', 'unique:gejala' ],
            'slug' => ['required', 'max:255', 'unique:gejala'],
            'detail' => ['required']

        ]);

        Gejala::create($rulesValidation);

        return redirect('admin/dashboard/gejala')->with('success', 'Data gejala baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {      
        $gejala = Gejala::where('slug', $slug)->firstOrFail();

        return view('dashboard_admin.gejala.show', [
            'pageTitle' => 'Detail Gejala',
            'gejala' => $gejala
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $gejala = Gejala::where('slug', $slug)->firstOrFail();

        return view('dashboard_admin.gejala.edit', [
            'pageTitle' => 'Edit Gejala',
            'gejala' => $gejala
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {   
        // ddd($request);

        $rulesValidation = [
            'nama' => ['required', 'max:255', 'unique:gejala'],
            'slug' => ['required', 'max:255', 'unique:gejala'],
            'detail' => ['required']
        ];

        if ($request->filled('nama') && $request->nama != $request->oldNama) {
            $rulesValidation['nama'] = ['required', 'max:255', 'unique:gejala'];
        }else{
            $rulesValidation['nama'] = ['required', 'max:255'];
        }

        if ($request->filled('slug') && $request->slug != $slug) {
            $rulesValidation['slug'] = ['required', 'max:255', 'unique:gejala'];
        }else{
            $rulesValidation['slug'] = ['required', 'max:255'];
        }

        $validatedData = $request->validate($rulesValidation);

        Gejala::where('slug', $slug)
            ->update($validatedData);

        return redirect('admin/dashboard/gejala')->with('success', 'Data gejala berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gejala = Gejala::findOrFail($id);

        $gejala->delete();

        return redirect('admin/dashboard/gejala')->with('success', 'Data gejala berhasil dihapus');
    }

    public function checkSlug(Request $request){

        $slug = SlugService::createSlug(Gejala::class, 'slug', $request->nama);

        return response()->json(['slug'=>$slug]);
    }
}
