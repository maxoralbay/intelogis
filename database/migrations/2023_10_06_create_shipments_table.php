<?php
// database/migrations/2023_10_06_create_shipments_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up() {
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('sourceKladr');
            $table->string('targetKladr');
            $table->float('weight');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('shipments');
    }
};
