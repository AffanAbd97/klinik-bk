<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dokter extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'dokter';


    public function poli(): BelongsTo
    {
        return $this->BelongsTo(Poli::class, 'id_poli', 'id');
    }

    public function jadwal(): HasOne
    {
        return $this->hasOne(JadwalPeriksa::class, 'id_dokter', 'id');
    }
}
