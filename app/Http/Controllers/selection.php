<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class selection extends Controller
{
    private $selection;

    public function __construct() {
        parent::__construct();
        $this->beforeFilter('@set_selection', [ 'only' => ['update', 'destroy'] ]);
    }

    // GET root_path
    public function home() {
        return response()
            @initialize_valiues()
    }

    // POST /selections
    public function create(Request $req) {
        $selection = Selection.new($req)
        $selection::set_choicese($req)
        $rtn_json
        if ($selection.save) {
            return response()
                $rtn_json
        }
        return response()
            $rtn_json
    }

    // PATCH/PUT /selections/1
    public function update(Request $req) {

    }

    // DELETE /selections/1
    public function destroy() {
        $selection->delete();
        
    }

    private function set_selection(int $id) {
      $selection = Selection::find($id)
    }

    private function initialize_valiues() {
        $rtn_args
    }
}
