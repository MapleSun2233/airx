<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
    //
    public $timestamps = false;
    protected $table = 'guests';
    protected $primaryKey = 'id';
}
