<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PasienController extends Controller
{
    protected $endpoint = 'http://localhost:8080/pasien';

    public function index()
    {
        $response = Http::get($this->endpoint);

        if ($response->successful()) {
            $pasien = $response->json();
        } else {
            $pasien = [];
            session()->flash('error', 'Gagal mengambil data pasien dari API.');
        }

        return view('pasien.index', compact('pasien'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'           => 'required|string|max:255',
            'alamat'         => 'required|string',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|in:L,P',
        ]);

        $response = Http::post($this->endpoint, $validated);

        if ($response->successful()) {
            return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan');
        }

        return back()->with('error', 'Gagal menambahkan data pasien');
    }

    public function edit($id)
    {
        $response = Http::get("{$this->endpoint}/{$id}");

        if ($response->successful()) {
            $pasien = $response->json()['data'] ?? [];
            return view('pasien.edit', compact('pasien'));
        }

        return redirect()->route('pasien.index')->with('error', 'Gagal mengambil data pasien');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'           => 'required|string|max:255',
            'alamat'         => 'required|string',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|in:L,P',
        ]);

        $response = Http::put("{$this->endpoint}/{$id}", $validated);

        if ($response->successful()) {
            return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui');
        }

        return back()->with('error', 'Gagal memperbarui data pasien');
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->endpoint}/{$id}");

        if ($response->successful()) {
            return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus');
        }

        return redirect()->route('pasien.index')->with('error', 'Gagal menghapus data pasien');
    }
}
