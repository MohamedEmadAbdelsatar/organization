<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('city_id');
            $table->text('governorate_id');
            $table->text('phone');
            $table->text('national_id');
            $table->text('location');
            $table->text('job');
            $table->text('guaranator_name');
            $table->text('guaranator_city_id');
            $table->text('guaranator_governorate_id');
            $table->text('guaranator_phone');
            $table->text('guaranator_national_id');
            $table->text('guaranator_location');
            $table->text('guaranator_job');
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
        Schema::dropIfExists('borrowers');
    }
}
