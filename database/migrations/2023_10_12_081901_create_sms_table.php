<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("amount_saved");
            $table->string("month_year")->nullable();
            $table->string("total_savings");
            $table->string("loan_deduction")->nullalbe();
            $table->string("loan_balance")->nullable();
            $table->string("int_deduction")->nullable();
            $table->string("int_balance")->nullable();
            $table->string("phone")->nullable();
            $table->string("status")->default("pending");
            $table->string("sender")->default("MFB");
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
        Schema::dropIfExists('sms');
    }
}
