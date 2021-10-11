<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Heatmap extends Model
{
    protected $table = 'heatmaps';
    public $timestamps = false;
}