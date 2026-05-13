<?php 
namespace App\Repositories;

use App\Models\BahanBaku;
use App\Repositories\BahanBakuRepositoryInterface;

class BahanBakuRepository implements BahanBakuRepositoryInterface
{
    public function all()
    {
        return BahanBaku::latest()->paginate();
    }

    public function find(int $id)
    {
        return BahanBaku::findOrFail($id);
    }

    public function create(array $data)
    {
        return BahanBaku::create($data);
    }

    public function update(int $id, array $data)
    {
        $bahan = $this->find($id);
        $bahan->update($data);
        return $bahan;
    }

    public function delete(int $id)
    {
        return BahanBaku::destroy($id);
    }
}