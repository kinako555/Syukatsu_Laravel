<?php

namespace App;

use Illuminate\Support\Str;

trait Modelable
{
    /*
    クラスからクラス名を複数形のスネークケース(小文字)にして返す
    例：ApplicationWayクラス -> "application_ways"
    */
    public static function plural_name() {
        $rtn_name = get_called_class();
        $rtn_name = Str::plural($rtn_name);
        $rtn_name = Str::snake($rtn_name);
        $rtn_name = strtolower($rtn_name);
        $rtn_name = Str::replaceFirst('app\_', '', $rtn_name);
        
        return $rtn_name;
    }
}