<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeknisiController extends Controller
{
    public function index()
    {
        $teknisis = User::where('role', 'teknisi')->get();
        return view('admin.pasien.index', compact('teknisis'));
    }

    public function create()
    {
        return view('admin.pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'no_ktp' => 'required|string|max:20',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'teknisi',
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('teknisi.index')->with('success', 'Teknisi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $teknisi = User::where('role', 'teknisi')->findOrFail($id);
        return view('admin.pasien.show', compact('teknisi'));
    }

    public function edit(string $id)
    {
        $teknisi = User::where('role', 'teknisi')->findOrFail($id);
        return view('admin.pasien.edit', compact('teknisi'));
    }

    public function update(Request $request, string $id)
    {
        $teknisi = User::where('role', 'teknisi')->findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $teknisi->id,
            'no_ktp' => 'required|string|max:20',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $teknisi->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('teknisi.index')->with('success', 'Teknisi berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $teknisi = User::where('role', 'teknisi')->findOrFail($id);
        $teknisi->delete();
        return redirect()->route('teknisi.index')->with('success', 'Teknisi berhasil dihapus.');
    }
}
