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
        $company = Company::create($company_param);
        if ($company) {
            $rtn_ars = ['company' => $company];
            return response()->json($rtn_ars);
        }
        // 失敗
        // 警告アラート表示
    }

    // PATCH/PUT /companies/1
    public function update(Request $req, int $id) {
        $company = Company::findOrFail($id);
        $company->update($req->company);

        return response()->json($company);
    }
    
}
