<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelectionStatusController extends Controller
{
    // POST /selection_status
    public function create(Request $req) {
        $req_value = $req->selection_status;

        // 成功
        $id = SelectionStatus::created_id($req_value);
        if ($id) {
            $rtn_ars = format_create_return_arg($id);
            return response()->json($rtn_ars);
        }
        // 失敗
        // 警告アラート表示
        return response()->json($rtn_json);
    }
}
