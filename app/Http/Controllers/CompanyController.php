<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Http\Requests\CompanyForm;

class CompanyController extends Controller
{
    // POST /companies
    public function create(CompanyForm $req) {
        //$company_param = $req->input('company');
        $validated = $req->validated();;
        // 成功
        $company = Company::create($validated['company']);
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
