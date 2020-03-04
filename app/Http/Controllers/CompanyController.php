<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

class CompanyController extends Controller
{
    // POST /companies
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

    // PATCH/PUT /companies/1
    public function update(Request $req) {
        $company = Company::find($id);
        $company->update($req->company);
    }
    
}
