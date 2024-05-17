<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inform extends Model
{
    protected $table="informs";
    protected $fillable = [
        'mac_address','carinfo_id','address_address','address_latitude','address_longitude','location'
    ];
}
