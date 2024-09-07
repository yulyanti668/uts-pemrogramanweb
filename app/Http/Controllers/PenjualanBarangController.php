<?php

namespace App\Http\Controllers;

use App\Models\PenjualanBarang;
use App\Models\User;
use Illuminate\Http\Request;

class PenjualanBarangController extends Controller
{
    public function index(Request $request)
    {
        $penjualans = PenjualanBarang::all();
        
        $user = $request->session()->get('user');

        $user = User::where('id', $user->id)->first();

        return view('penjualan.index', compact('penjualans', 'user'));
    }

    public function create(Request $request)
    {
        $user = $request->session()->get('user');

        $user = User::where('id', $user->id)->first();

        return view('penjualan.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|max:50',
            'tanggal_penjualan' => 'required|date',
            'pelanggan' => 'required|max:50',
            'jumlah' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
        ]);

        PenjualanBarang::create([
            'nama_barang' => $request->nama_barang,
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'pelanggan' => $request->pelanggan,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total' => $request->jumlah * $request->harga_satuan,
        ]);

        session()->flash('success', 'Data penjualan baru berhasil ditambahkan!');

        return redirect()->route('list-penjualan');
    }

    public function edit(Request $request, PenjualanBarang $penjualanBarang)
    {
        $user = $request->session()->get('user');
        
        $user = User::where('id', $user->id)->first();

        return view('penjualan.edit', compact('penjualanBarang', 'user'));
    }

    public function update(Request $request, PenjualanBarang $penjualanBarang)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|max:50',
            'tanggal_penjualan' => 'required|date',
            'pelanggan' => 'required|max:50',
            'jumlah' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
        ]);

        $penjualanBarang->update([
            'nama_barang' => $request->nama_barang,
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'pelanggan' => $request->pelanggan,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total' => $request->jumlah * $request->harga_satuan,
        ]);
        
        session()->flash('success', 'Data penjualan baru berhasil diperbaharui!');

        return redirect()->route('list-penjualan');
    }

    public function delete(PenjualanBarang $penjualanBarang)
    {
        $penjualanBarang->delete();

        session()->flash('success', 'Data penjualan baru berhasil dihapus!');

        return redirect()->route('list-penjualan');
    }
}
