<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use Modelable;
    
    protected $guarded = ['id'];
}
