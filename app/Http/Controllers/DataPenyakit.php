<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DataPenyakit extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $penyakit = Penyakit::all();   

        return view('dashboard_admin.penyakit.index', [
            'pageTitle' => 'Data Penyakit',
            'penyakit' => $penyakit
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard_admin.penyakit.tambah', [
            'pageTitle' => 'Tambah Penyakit'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rulesValidation = $request->validate([
            'nama' => ['required', 'max:255', 'unique:penyakit' ],
            'slug' => ['required', 'max:255', 'unique:penyakit'],
            'detail' => ['required']

        ]);

        Penyakit::create($rulesValidation);

        return redirect('admin/dashboard/penyakit')->with('success', 'Data penyakit baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {      
        $penyakit = Penyakit::where('slug', $slug)->firstOrFail();

        return view('dashboard_admin.penyakit.show', [
            'pageTitle' => 'Detail Penyakit',
            'penyakit' => $penyakit
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $penyakit = Penyakit::where('slug', $slug)->firstOrFail();

        return view('dashboard_admin.penyakit.edit', [
            'pageTitle' => 'Edit Penyakit',
            'penyakit' => $penyakit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {   

        $rulesValidation = [
            'nama' => ['required', 'max:255', 'unique:penyakit'],
            'slug' => ['required', 'max:255', 'unique:penyakit'],
            'detail' => ['required']
        ];

        if ($request->filled('nama') && $request->nama != $request->oldNama) {
            $rulesValidation['nama'] = ['required', 'max:255', 'unique:penyakit'];
        }else{
            $rulesValidation['nama'] = ['required', 'max:255'];
        }

        if ($request->filled('slug') && $request->slug != $slug) {
            $rulesValidation['slug'] = ['required', 'max:255', 'unique:penyakit'];
        }else{
            $rulesValidation['slug'] = ['required', 'max:255'];
        }

        $validatedData = $request->validate($rulesValidation);

        Penyakit::where('slug', $slug)
            ->update($validatedData);

        return redirect('admin/dashboard/penyakit')->with('success', 'Data penyakit berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penyakit = Penyakit::findOrFail($id);

        $penyakit->delete();

        return redirect('admin/dashboard/penyakit')->with('success', 'Data penyakit berhasil dihapus');
    }

    public function checkSlug(Request $request){

        $slug = SlugService::createSlug(Penyakit::class, 'slug', $request->nama);

        return response()->json(['slug'=>$slug]);
    }
}
