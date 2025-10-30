<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class Tarefa extends Model
{
    use HasFactory;


    protected $fillable = ['titulo', 'descricao', 'status_concluida', 'categoria_id'];


    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}