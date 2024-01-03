<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPeriksa extends Model
{
    use HasFactory;
    use HasUuids;
    protected $table = 'detail_periksa';
    public function obat(): BelongsTo
    {
        return $this->BelongsTo(Obat::class, 'id_obat', 'id');
    }
}
