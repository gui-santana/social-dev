<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'user_id', // Adicionamos user_id também, pois ele é definido implicitamente
    ];


    /**
     * Pega o usuário (User) que é o dono do Post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}