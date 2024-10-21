<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['comentario', 'id_usuario_origem', 'id']; // Inclua todos os campos necessários

    // Relação com o produto
    public function produto()
    {
        return $this->belongsTo(Products::class, 'id', 'id_usuario');
    }

    // Relação com o usuário
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario_origem', 'id');
    }
}