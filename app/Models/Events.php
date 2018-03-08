<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = "events";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function images()
    {
        return $this->hasMany("App\Models\Image","eventId","id")->orderBy("id");
    }
}
