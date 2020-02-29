<?php

namespace App;

use App\ApplicationWay;
use App\SelectionStatus;
use App\Season;

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
        foreach ($choicese as $choice) { $rtn_args[$choice::plural_name()] = $choice->get(); }
        return $rtn_args;
    }
}