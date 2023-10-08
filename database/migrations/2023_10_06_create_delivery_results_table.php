<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up() {
        Schema::create('delivery_results', function (Blueprint $table) {
              $table->increments('id')->unsigned();
            $table->integer('shipment_id');
            $table->enum('service_type', ['fast', 'slow']);
            $table->float('price')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('error')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('delivery_results');
    }
};
