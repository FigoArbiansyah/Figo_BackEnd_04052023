<?php

namespace App\Models;

use App\Models\Nasabah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    public function nasabah() {
        return $this->belongsTo(Nasabah::class);
    }
}
