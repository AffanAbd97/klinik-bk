<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Periksa extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'periksa';

    public function daftarPoli(): BelongsTo
    {
        return $this->BelongsTo(DaftarPoli::class, 'id_daftar_poli', 'id');
    }
    public function detail(): HasMany
    {
        return $this->HasMany(DetailPeriksa::class, 'id_periksa', 'id');
    }
}
