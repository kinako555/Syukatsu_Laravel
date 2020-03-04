<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use Modelable;
    protected $guarded = ['id'];

    public function selections()
    {
        return $this->hasMany('App\Selection');
    }
}
