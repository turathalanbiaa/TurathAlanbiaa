<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "event_images";
    protected $primaryKey = "id";
    public $timestamps = false;
}
