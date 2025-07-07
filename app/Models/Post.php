<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- ADICIONE ESTA LINHA
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // <-- E ADICIONE ESTA LINHA

    /**
     * Pega o usuário (User) que é o dono do Post.
     */
    public function user()
    {
        // Um Post pertence a (belongsTo) um User.
        return $this->belongsTo(User::class);
    }
}