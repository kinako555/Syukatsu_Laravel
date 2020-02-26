<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectionStatus extends Model
{
    use Modelable;
    
    # 選考終了項目IDすべてを取得する
    public static function close_ids() {
        return self::select('id')->where('active', false)->get();
    }
}
