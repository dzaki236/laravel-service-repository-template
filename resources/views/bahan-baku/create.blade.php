@extends('layouts.app')

@section('content')
    <h3>Tambah Bahan Baku</h3>

    <form method="POST" action="{{ route('bahan-baku.store') }}">
        @csrf

        <div class="mb-2">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>

        <div class="mb-2">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control">
        </div>

        <div class="mb-2">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control">
        </div>

        <div class="mb-2">
            <label>Satuan</label>
            <input type="text" name="satuan" class="form-control">
        </div>

        <div class="mb-2">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
@endsection
