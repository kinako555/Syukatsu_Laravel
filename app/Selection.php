<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    use Modelable;
    
    # リレーション
    public function application_way() {
        return $this->hasOne('App\ApplicationWay');
    }
    public function season() {
        return $this->hasOne('App\Season');
    }
    public function company() {
        return $this->hasOne('App\Company');
    }
    public function selection_status() {
        return $this->hasOne('App\SelectionStatus');
    }
}
