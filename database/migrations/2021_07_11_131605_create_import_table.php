<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->text('supplier_id');
            $table->text('value');
            $table->text('earn');
            $table->text('base_installment');
            $table->text('interest_installment');
            $table->text('total');
            $table->text('interest');
            $table->text('base_remaining');
            $table->text('interest_remaining');
            $table->text('base_payment');
            $table->text('interest_payment');
            $table->text('base_status');
            $table->text('interest_status');
            $table->text('base_total_paid');
            $table->text('interest_total_paid');
            $table->text('period');
            $table->text('start');
            $table->text('end');
            $table->text('start_year');
            $table->text('end_year');
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
        Schema::dropIfExists('import');
    }
}
