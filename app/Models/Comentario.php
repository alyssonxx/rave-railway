<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['id_usuario_origem', 'id_usuario_destino', 'comentario']; // Adicione os campos que podem ser preenchidos

    public function usuario()
{
    return $this->belongsTo(User::class, 'id_usuario_origem');
}
}