<?php

use Illuminate\Database\Seeder;

use App\ApplicationWay;
use App\SelectionStatus;
use App\Season;
use App\Selection;
use App\Company;
use App\Choicese;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        create_undefined_choicese();
        SelectionStatus::create(['name'=> "☓", 'active'=> false]);
        $decline     = SelectionStatus::create(['name'=> "☓(辞退)", 'active'=> false]);
        $wait_result = SelectionStatus::create(['name'=> "結果待ち"]);

        $season = Season::create(['name'=> "2020年：1月頃"]);

        $wantedly = ApplicationWay::create(['name'=> "Wantedly"]);
        $green    = ApplicationWay::create(['name'=> "Green"]);
        ApplicationWay::create(['name'=> "リクルートエージェント"]);
        ApplicationWay::create(['name'=> "HP"]);

        $apple_link   = "https://www.apple.com/jp/?afid=p238%7CsKSMckWTz-dc_mtid_18707vxu38484_pcrid_405253683564_pgrid_13140806301_&cid=aos-jp-kwgo-brand--slid---product--";
        $rakuten_link = "https://www.rakuten.co.jp/";
        $apple   = Company::create(['name'=> "Apple", 'kana'=> "あっぷる", 'link'=> $apple_link]);
        $rakuten = Company::create(['name'=> "楽天",  'kana'=> "らくてん", 'link'=> $rakuten_link]);

        Selection::create(['company_id'=> $apple->id, 
                           'remarks'=> "ジョブス", 
                           'documents_password'=> "pass1",
                           'selection_status_id'=>   $decline->id, 
                           'application_way_id'=>    $wantedly->id, 
                           'season_id'=> $season->id]);

        Selection::create(['company_id'=> $rakuten->id, 
                           'remarks'=> "イニエスタ", 
                           'documents_password'=> "pass2",
                           'selection_status_id'=>   $wait_result->id, 
                           'application_way_id'=>    $green->id, 
                           'season_id'=> $season->id]);
    }

    private function create_undefined_choicese() {
        foreach (Choicese::choice_objects as $choice) {
            $choice->create(['id' => 0, 'name'=> "未選択"]);
        }
    }
}
