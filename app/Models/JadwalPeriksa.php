<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPeriksa extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'jadwal_periksa';

    public function dokter(): BelongsTo
    {
        return $this->BelongsTo(Dokter::class, 'id_dokter', 'id');
    }
}
