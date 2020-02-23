<?php

namespace App;

use App\ApplicationWay;
use App\SelectionStatus;
use App\Season;

# class_nameのみ使用
use Illuminate\Support\Str;

class Choicese
{                                      

    public static function choice_objects() {
        $choicese = [new ApplicationWay(),
                     new SelectionStatus(),
                     new Season()];
        return $choicese;
    }

    /*
    選択肢系の全データを連想配列の格納
    キー名はクラス名を複数形のスネークケース(小文字)にしたもの
    */
    public static function choicese_all() {
        $choicese = self::choice_objects();
        $rtn_args = array();
        foreach ($choicese as $choice) {
            $rtn_args[self::class_name($choice)] = $choice->get();
        }
        return $rtn_args;
    }

    /*
    オブジェクトからクラス名を複数形のスネークケース(小文字)にして返す
    例：ApplicationWayのオブジェクト -> "application_ways"
    */
    public static function class_name($obj) {
        $rtn_name = get_class($obj);
        $rtn_name = Str::plural($rtn_name);
        $rtn_name = Str::snake($rtn_name);
        $rtn_name = strtolower($rtn_name);
        $rtn_name = Str::replaceFirst('app\_', '', $rtn_name);
        
        return $rtn_name;
    }  
}