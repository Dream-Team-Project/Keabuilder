<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webpages extends Model
{
    protected $table = 'webpages';
    protected $fillable = ['page_name','page_url','type','publish_status','updated_at'];
}
