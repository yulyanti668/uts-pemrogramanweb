@extends('layouts.app')

@section('heading', 'Tambah Data Penjualan')

@section('title', 'Tambah Data Penjualan')

@section('content')
<div class="card-body">
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form action="{{ route('post-penjualan') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang">
        </div>
        <div class="form-group">
            <label for="tanggal_penjualan">Tanggal Penjualan</label>
            <input type="date" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" value="dd/mm/yyyy">
        </div>
        <div class="form-group">
            <label for="pelanggan">Pelanggan</label>
            <input type="text" class="form-control" id="pelanggan" name="pelanggan">
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1">
        </div>
        <div class="form-group">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" min="1">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
        <a href="{{ route('list-penjualan') }}" type="submit" class="btn btn-danger mt-2">Kembali</a>
    </form>
</div>
@endsection