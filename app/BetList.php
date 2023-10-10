<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Carbon\Carbon;

class BetList extends Model
{
    protected $collection = "lucky_16_cards_tracks";    
    
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    public function userName()
    {
        return $this->belongsTo('App\GameUser', 'user_id', '_id');
    }
}
