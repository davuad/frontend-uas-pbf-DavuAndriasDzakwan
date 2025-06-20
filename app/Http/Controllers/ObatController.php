<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ObatController extends Controller
{
    private $apiBaseUrl = 'http://localhost:8080/obat';

    public function index()
    {
        $response = Http::get($this->apiBaseUrl);

        if ($response->successful()) {
            $obat = $response->json();
        } else {
            $obat = [];
            session()->flash('error', 'Gagal mengambil data obat dari API.');
        }

        return view('obat.index', compact('obat'));
    }

    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        Http::post($this->apiBaseUrl, $request->all());
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $response = Http::get("{$this->apiBaseUrl}/{$id}");

        if ($response->successful()) {
            $result = $response->json();
            $obat = $result['data']; // ambil hanya bagian "data"
        } else {
            abort(404, 'Data obat tidak ditemukan.');
        }

        return view('obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['nama_obat', 'kategori', 'stok', 'harga']);

        Http::put("{$this->apiBaseUrl}/{$id}", $data);

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diperbarui');
    }



    public function destroy($id)
    {
        Http::delete("{$this->apiBaseUrl}/{$id}");
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus');
    }
}
