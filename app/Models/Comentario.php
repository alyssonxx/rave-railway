<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comentario extends Model
{
    protected $table = 'comentario'; 
    use HasFactory;

    protected $fillable = ['comentario', 'id_usuario_origem', 'id_comentario']; // Inclua todos os campos necessários

    public $timestamps = false;

    // Relação com o produto
    public function comentarios()
    {
        return $this->hasMany(Comentarios::class, 'id_produto', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id');
    }
}