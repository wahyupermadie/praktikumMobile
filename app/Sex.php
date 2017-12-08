<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $table = 'tb_kelamin';
    protected $fillable = ['id','name'];
    
    public function member()
    {
       return $this->hasMany('App\Member');
    }
}
