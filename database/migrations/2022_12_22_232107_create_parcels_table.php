<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string('pick_up_address')->nullable();
            $table->string('drop_off_address')->nullable();
            $table->unsignedBigInteger('sender_id')->index();
            $table->unsignedBigInteger('biker_id')->index()->nullable();
            $table->enum('status', ['new', 'picked_up']);
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
        Schema::dropIfExists('parcels');
    }
}
