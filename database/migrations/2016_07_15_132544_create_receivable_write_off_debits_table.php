<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivableWriteOffDebitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erp_receivable_write_off_debit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('master_code', 20)->comment = "表頭單號";
            $table->string('debit_code', 20)->comment = "收款單號";
            $table->integer('debit_amount')->comment = "收款單沖銷金額";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('erp_receivable_write_off_debit');
    }
}
