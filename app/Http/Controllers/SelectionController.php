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
        $selection = $req->selection;
        $req_application_way = $req->application_way;
        $req_application_way = $req->company;
        $req_application_way = $req->season;
        $req_application_way = $req->selection_status;
        if (is_created($req->application_way)) $selection->application_way_id = ApplicationWay::create('name', $req->application_way['name'])->id;
        if (is_created($req->company)) $selection->company_id = Company::create('name', $req->company['name'])->id;
        if (is_created($req->season))  $selection->season_id  = Season::create('name' , $req->season['name']) ->id;
        if (is_created($req->selection_status)) $selection->selection_status_id = selectionStatus::create('name', $req->selection_status['name'])->id;

        if (Selection::save($selection)) {
            return response()->json();
        }
        return response()->json($rtn_json);
    }

    // PATCH/PUT /selections/1
    public function update(Request $req) {

    }

    // DELETE /selections/1
    public function destroy(int $id) {
        $selection = Selection::find($id);
        $selection->delete();
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
                $que->Company::select('id')->where('name', 'LIKE', "%{$company_name}%");
            });
        }
        if ($season_id) $selections_query_builder->where('season_id', $season_id);

        return $selections_query_builder;
    }

    private function is_created($req_value) {
        return req_value.created;
    }
}
