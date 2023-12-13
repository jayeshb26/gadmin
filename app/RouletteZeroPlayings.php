<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model;
use Carbon\Carbon;

class RouletteZeroPlayings extends Model
{
    protected $collection = "roulette_zero_playings";    
    
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
}

