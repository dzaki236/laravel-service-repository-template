@extends('layouts.app')

@section('content')
    <h3>Edit Bahan Baku</h3>

    <form method="POST" action="{{ route('bahan-baku.update', $item->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $item->nama }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Kode</label>
            <input type="text" name="kode" value="{{ $item->kode }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Stok</label>
            <input type="number" name="stok" value="{{ $item->stok }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Satuan</label>
            <input type="text" name="satuan" value="{{ $item->satuan }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ $item->harga }}" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
