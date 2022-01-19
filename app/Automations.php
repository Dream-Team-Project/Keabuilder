<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automations extends Model
{
    protected $table = 'automations';
    protected $fillable = ['name','created','active'];
}
