<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'rotation',
        'dimensions',
        'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function boardTiles()
    {
        return $this->hasMany(BoardTiles::class);
    }
}
