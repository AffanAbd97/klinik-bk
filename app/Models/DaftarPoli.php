<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarPoli extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'daftar_poli';

    public function jadwal(): BelongsTo
    {
        return $this->BelongsTo(JadwalPeriksa::class, 'id_jadwal', 'id');
    }

    public function pasien(): BelongsTo
    {
        return $this->BelongsTo(Pasien::class, 'id_pasien', 'id');
    }

    public function periksa(): HasOne
    {
        return $this->hasOne(Periksa::class, 'id_daftar_poli', 'id');
    }
}
