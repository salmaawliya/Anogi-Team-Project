<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = 'barangs';

    public $fillable = [
        'nama'
    ];

    protected $casts = [
        'nama' => 'string'
    ];

    public static array $rules = [
        'nama' => 'required'
    ];

    
}
