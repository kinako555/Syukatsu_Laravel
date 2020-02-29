<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Season;

class SeasonController extends Controller
{
     // POST /seasons
     public function create(Request $req) {
        $req_value = $req->season;

        // 成功
        $id = Season::created_id($req_value);
        if ($id) {
            $rtn_ars = format_create_return_arg($id);
            return response()->json($rtn_ars);
        }
        // 失敗
        // 警告アラート表示
        return response()->json($rtn_json);
    }
}
