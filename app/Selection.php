<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    use Modelable;

    protected $guarded = ['id'];
    
    # リレーション
    public function application_way() {
        return $this->belongsTo('App\ApplicationWay');
    }
    public function season() {
        return $this->belongsTo('App\Season');
    }
    public function company() {
        return $this->belongsTo('App\Company');
    }
    public function selection_status() {
        return $this->belongsTo('App\SelectionStatus');
    }
}
