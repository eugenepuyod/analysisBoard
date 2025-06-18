<?php

namespace App\Models;


use Carbon\Carbon;
use App\Models\MovesModel;
use Illuminate\Database\Eloquent\Model;

class GameModel extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'rwhite',
        'rblack',
        'white',
        'black',
        'book',
        'play',
        'randomgame',
        'todo',
        'donetodo',
        'variationid',
    ];

    public function moves(){
        return $this->hasMany(MovesModel::class, 'game_id');
    }

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('M j Y');
    }

    public static function search($query)
    {
        return self::where('name', 'like', '%' .$query. '%');
    }

}
