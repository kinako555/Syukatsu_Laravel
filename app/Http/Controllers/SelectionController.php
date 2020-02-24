<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $selection = Selection::new($req);
        $selection::set_choicese($req);
        $rtn_json;
        if ($selection.save) {
            return response()->json($rtn_json);
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

    # 初期表示データ
    private function initialize_valiues() {
        $rtn_args = array();
        $rtn_args['selections'] = Selection::get();
        $rtn_args = array_merge($rtn_args, Choicese::choicese_all());
        $rtn_args['companys']  = Company::get();
        $rtn_args['close_ids'] = SelectionStatus::close_ids();
        return $rtn_args;
    }
}
