<?php 
namespace App\Services;

use App\Repositories\BahanBakuRepository;
use App\Services\BahanBakuServiceInterface;

class BahanBakuService implements BahanBakuServiceInterface
{
    protected BahanBakuRepository $repo;

    public function __construct(BahanBakuRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll()
    {
        return $this->repo->all();
    }

    public function getById(int $id)
    {
        return $this->repo->find($id);
    }

    public function store(array $request)
    {
        return $this->repo->create($request);
    }

    public function update(int $id, array $request)
    {
        return $this->repo->update($id, $request);
    }

    public function destroy(int $id)
    {
        return $this->repo->delete($id);
    }
}