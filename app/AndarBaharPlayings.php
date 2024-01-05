<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model;
use Carbon\Carbon;

class AndarBaharPlayings extends Model
{
    protected $collection = "andar_bahars";    
    
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
}



