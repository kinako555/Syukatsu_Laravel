<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectionStatus extends Model
{
    # 選考終了項目IDすべてを取得する
    public static function close_ids() {
        self::select('id')->where('active', false);
    }
}
