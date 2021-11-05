<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardTiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'board_location'
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function tileConfiguration()
    {
        return $this->hasOne(TileConfiguration::class);
    }
}
