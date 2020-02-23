<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->nullable(true);
            $table->text('remarks')->nullable(true);
            $table->string('documents_password')->nullable(true);
            $table->date('next_appointment')    ->nullable(true);
            $table->bigInteger('selection_status_id')->nullable(true);
            $table->bigInteger('application_way_id') ->nullable(true);
            $table->bigInteger('season_id')->nullable(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selections');
    }
}
