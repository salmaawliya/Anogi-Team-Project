<?php

namespace App\Repositories;

use App\Models\Barang;
use App\Repositories\BaseRepository;

class BarangRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nama'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Barang::class;
    }
}
