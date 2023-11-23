<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBarangAPIRequest;
use App\Http\Requests\API\UpdateBarangAPIRequest;
use App\Models\Barang;
use App\Repositories\BarangRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class BarangAPIController
 */
class BarangAPIController extends AppBaseController
{
    private BarangRepository $barangRepository;

    public function __construct(BarangRepository $barangRepo)
    {
        $this->barangRepository = $barangRepo;
    }

    /**
     * Display a listing of the Barangs.
     * GET|HEAD /barangs
     */
    public function index(Request $request): JsonResponse
    {
        $barangs = $this->barangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($barangs->toArray(), 'Barangs retrieved successfully');
    }

    /**
     * Store a newly created Barang in storage.
     * POST /barangs
     */
    public function store(CreateBarangAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $barang = $this->barangRepository->create($input);

        return $this->sendResponse($barang->toArray(), 'Barang saved successfully');
    }

    /**
     * Display the specified Barang.
     * GET|HEAD /barangs/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Barang $barang */
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            return $this->sendError('Barang not found');
        }

        return $this->sendResponse($barang->toArray(), 'Barang retrieved successfully');
    }

    /**
     * Update the specified Barang in storage.
     * PUT/PATCH /barangs/{id}
     */
    public function update($id, UpdateBarangAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Barang $barang */
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            return $this->sendError('Barang not found');
        }

        $barang = $this->barangRepository->update($input, $id);

        return $this->sendResponse($barang->toArray(), 'Barang updated successfully');
    }

    /**
     * Remove the specified Barang from storage.
     * DELETE /barangs/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Barang $barang */
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            return $this->sendError('Barang not found');
        }

        $barang->delete();

        return $this->sendSuccess('Barang deleted successfully');
    }
}
