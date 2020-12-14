<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filenames extends Model
{
    //
    public $timestamps = false;
    protected $table = 'filenames';
    protected $primaryKey = 'id';
}
