<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\ApplicationWay;
use App\SelectionStatus;
use App\Season;
use App\Selection;
use App\Company;
use App\Choicese;

class SelectionController extends Controller
{

    // GET root_path
    public function home() {
        return response()
                ->json(self::initialize_valiues());
    }

    // POST /selections
    public function create(Request $req) {
        $selection_param = $req->input('selection');
        $selection = Selection::create($selection_param);      
        if ($selection) {
            $rtn_ars = ['selection' => $selection];
            return response()->json($rtn_ars);
        }
    }

    // PATCH/PUT /selections/1
    public function update(Request $req, int $id) {
        $selection = Selection::findOrFail($id);
        $selection->update($req->input('selection'));
        return response()->json($selection);
    }

    // DELETE /selections/1
    /*
    削除するselectionに登録されているcompanyが1つのselectionにしか登録されていない場合は削除する
    */
    public function destroy(int $id) {
        $selection = Selection::findOrFail($id);
        if (Company::where('id', $selection->company_id)->exists()){
            if ($selection->company->selections->count() <= 1) $selection->company->delete();
        }
        $selection->delete();
        return response()->json();
    }

    // GET /selections?
    public function search(Request $req) {
        $selections = self::format_search_query_builder($req);
        $rtn_args['selections'] = $selections->get();
        return response()
            ->json($rtn_args);
    }

    # 初期表示データ
    private function initialize_valiues() {
        $rtn_args = array();
        $rtn_args[Selection::plural_name()] = Selection::get();
        $rtn_args = array_merge($rtn_args, Choicese::choicese_all());
        $rtn_args[Company::plural_name()] = Company::get();
        $rtn_args['close_ids'] = SelectionStatus::close_ids();
        return $rtn_args;
    }

    /*
    URIクエリよりwhere条件を付与したクエリビルダを返す
    何も指定されていない場合where条件なし
    */
    private function format_search_query_builder(Request $req) {
        $company_name = $req->query('company_name', null);
        $season_id    = $req->query('season_id', null);
        $selections_query_builder = Selection::select('*');
        if ($company_name) {
            $selections_query_builder->whereIn('company_id', function($que) use ($company_name){
                $que->select('id')->where('name', 'LIKE', "%{$company_name}%")->from('companies');
            });
        }
        if ($season_id != "undefined") $selections_query_builder->where('season_id', $season_id);

        return $selections_query_builder;
    }

    private function is_created($req_value) {
        return req_value.created;
    }
}
