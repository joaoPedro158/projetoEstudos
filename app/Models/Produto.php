<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Adicione esta linha
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory; // Adicione esta linha

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'imagem',
        'nome',
        'descricao',
        'preco',
        'estoque',
        'user_id'
    ];

    /**
     * Get the user that owns the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   public function usuariosFavoritaram()
    {
        return $this->belongsToMany(User::class, 'favoritos');
    }
}
