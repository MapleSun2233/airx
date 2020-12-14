<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    //
    public $timestamps = false;
    protected $table = 'tickets';
    protected $primaryKey = 'id';
}
