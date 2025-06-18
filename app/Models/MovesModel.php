<?php

namespace App\Models;

use App\Models\GameModel;
use Illuminate\Database\Eloquent\Model;

class MovesModel extends Model
{
    protected $fillable = [
        'gameid',
        'classorid',
        'movesource',
        'variantion',
        'fened',
    ];

    public function game(){
        return $this->belongsTo(GameModel::class, 'game_id');
    }
}
