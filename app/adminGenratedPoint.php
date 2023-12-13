<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class adminGenratedPoint extends Model
{
    protected $collection = 'admingeneratepoints';
    protected $primaryKey = '_id';
}
