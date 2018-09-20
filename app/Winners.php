<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winners extends Model
{
    protected $table = 'winners';
    public $timestamps = false;
    protected $fillable = ['winner_id'];
}
