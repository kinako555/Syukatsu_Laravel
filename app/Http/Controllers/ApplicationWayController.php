<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationWayController extends Controller
{
    // POST /application_ways
    public function create(Request $req) {
        $req_value = $req->Application_way;

        // 成功
        $id = ApplicationWay::created_id($req_value);
        if ($id) {
            $rtn_ars = format_create_return_arg($id);
            return response()->json($rtn_ars);
        }
        // 失敗
        // 警告アラート表示
        return response()->json($rtn_json);
    }
}
