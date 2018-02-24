<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = "faq";
    protected $primaryKey = "id";
    public $timestamps = false;
}
