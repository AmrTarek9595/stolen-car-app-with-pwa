<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carinfo extends Model
{
    protected $table="carinfos";
    protected $fillable = [
        'fullname','mobilenumber','carnumber','image1','image2','govid','cityid','code'
    ];
}
