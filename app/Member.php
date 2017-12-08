<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'Nama','Email','kelamin_id','Picture',
    ];
    function sex()
    {
        return $this->belongsTo('App\Sex');
    }
}
