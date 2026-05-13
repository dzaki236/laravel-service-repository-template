@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Data Bahan Baku</h3>
        <a href="{{ route('bahan-baku.create') }}" class="btn btn-primary">
            + Tambah
        </a>
    </div>
    <form method="GET" class="row mb-3">

        <div class="col-md-4">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control"
                   placeholder="Cari nama atau kode...">
        </div>
    
        <div class="col-md-2">
            <button class="btn btn-primary">
                Search
            </button>
        </div>
    
        <div class="col-md-2">
            <a href="{{ route('bahan-baku.index') }}" class="btn btn-secondary">
                Refresh
            </a>
        </div>
    
    </form>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Kode</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td>Rp {{ number_format($item->harga) }}</td>
                    <td>
                        <a href="{{ route('bahan-baku.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('bahan-baku.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{ $data->links() }}
    </div>
@endsection
