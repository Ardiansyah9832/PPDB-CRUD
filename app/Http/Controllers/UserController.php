<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $users = User::find($id);
        return view('user.edit', compact('users'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id, // Pastikan email unik kecuali milik pengguna ini
            'role' => 'required',
            'password' => 'nullable|string|min:6', // Password tidak wajib diisi
        ]);
    
        // Cari pengguna berdasarkan ID
        $user = User::findOrFail($id);
    
        // Update data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
    
        // Jika password diisi, hash password baru, jika tidak, biarkan password lama tetap digunakan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); // Update password jika diisi
        }
    
        // Simpan perubahan ke database
        $user->save();
    
        return redirect()->route('user.index')->with('success', 'Data pengguna berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Data pengguna berhasil dihapus');
        }
}
