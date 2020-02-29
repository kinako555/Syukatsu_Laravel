<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

class CompanyController extends Controller
{
    // POST /Companies
    public function create(Request $req) {
        $company = $req->company;

        // 成功
        $id = Company::created_id($season_req);
        if ($id) {
            $rtn_ars = format_create_return_arg($id);
            return response()->json($rtn_ars);
        }
        // 失敗
        // 警告アラート表示
        return response()->json($rtn_json);
    }
    
}
