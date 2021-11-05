<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TileConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'height',
        'width',
        'text_color',
        'background_color'
    ];

    public function tile()
    {
        return $this->belongsTo(Tile::class);
    }

    public function boardTiles()
    {
        return $this->belongsTo(BoardTiles::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
