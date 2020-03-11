<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

class CompanyController extends Controller
{
    // POST /companies
    public function create(Request $req) {
        $company_param = $req->input('company');

        // 成功
        $id = Company::created_id($company_param);
        if ($id) {
            $rtn_ars = self::format_create_return_arg($id);
            return response()->json($rtn_ars);
        }
        // 失敗
        // 警告アラート表示
    }

    // PATCH/PUT /companies/1
    public function update(Request $req) {
        $company = Company::find($id);
        $company->update($req->company);
    }
    
}
