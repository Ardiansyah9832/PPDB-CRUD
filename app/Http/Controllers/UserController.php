<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required',
        ]);

        $namePart = substr($request->name, 0, 3); // 3 karakter pertama dari nama
        $emailPart = substr($request->email, 0, 3); // 3 karakter pertama dari email
    
        // Gabungkan kedua bagian untuk membuat password default
        $defaultPassword = $namePart . $emailPart;
    
        // Enkripsi password menggunakan bcrypt atau Hash
        $hashedPassword = Hash::make($defaultPassword);
    
        // Simpan data pengguna ke dalam database
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $hashedPassword; // Simpan password yang sudah di-hash
        $users->role = $request->role; //  pengguna
        $users->save();
    
        return redirect()->route('user.index')->with('success', 'Berhasil menambahkan data pengguna!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
