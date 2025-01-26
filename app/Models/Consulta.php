<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consulta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'consulta';

    protected $fillable = ['data', 'medico_id', 'paciente_id'];
    public function Paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }
}
