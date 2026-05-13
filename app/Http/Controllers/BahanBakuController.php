<?php
namespace App\Http\Controllers;

use App\Services\BahanBakuService;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    protected BahanBakuService $service;

    public function __construct(BahanBakuService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $data = $this->service->getAll();
        return view('bahan-baku.index', compact('data'));
    }

    public function create(){
        return view('bahan-baku.create');
    }

    public function store(Request $request){
        $this->service->store($request->all());
        return redirect()->route('bahan-baku.index')->with('success', 'Bahan Baku berhasil ditambahkan');
    }

    public function edit(int$id){
        $item = $this->service->getById($id);
        return view('bahan-baku.edit', compact('item'));
    }

    public function update(Request $request, int $id){
        $this->service->update($id, $request->all());
        return redirect()->route('bahan-baku.index')->with('success', 'Bahan Baku berhasil diupdate');
    }

    public function destroy(int $id){
        $this->service->destroy($id);
        return redirect()->route('bahan-baku.index')->with('success', 'Bahan Baku berhasil dihapus');
    }
}