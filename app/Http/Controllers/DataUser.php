<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class DataUser extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $users = Users::all();

        return view('dashboard_admin.data_user.index', [
            'pageTitle' => 'Data user',
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard_admin.data_user.tambah', [
            'pageTitle' => 'Tamabah Data user',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $rulesValidation = $request->validate([
            'nama' => ['required','max:200'],
            'username' => ['required','min:3','max:200','unique:user'],
            'email' => ['required','email:dns','unique:user'],
            'password' => ['required','min:6']
        ]);
        $rulesValidation['password'] = Hash::make($rulesValidation['password']);

        Users::create($rulesValidation);

        return redirect('/admin/dashboard/datauser')->with('success', 'Data user berhasil ditambahkan');
     }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {   
        $user = Users::where('username', $username)->firstOrFail();

        return view('dashboard_admin.data_user.show', [
            'pageTitle' => 'Detail Data user',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $username)
    {
        $user = Users::where('username', $username)->firstOrFail();

        return view('dashboard_admin.data_user.edit', [
            'pageTitle' => 'Detail Data user',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $username)
    {    
        // ddd($request);
        $rulesValidation = [
            'nama' => ['required', 'max:255'],
            'email' => ['required', 'email:dns'],
        ];

        if ($request->filled('username') && $request->username != $username) {
            $rulesValidation['username'] = ['required', 'max:255', 'unique:user'];
        }else{
            $rulesValidation['username'] = ['required', 'max:255'];
        }

        $validatedData = $request->validate($rulesValidation);

        Users::where('username', $username)
            ->update($validatedData);

        return redirect('/admin/dashboard/datauser')->with('success', 'Data user berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Users::findOrFail($id);

        $user->delete();

        return redirect('admin/dashboard/datauser')->with('success', 'Data user berhasil dihapus');
    }
}
