<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('package_id');
            $table->integer('percentage');
            $table->integer('duration');
            $table->integer('profit');
            $table->integer('maturity')->default(0);
            $table->integer('withdrawn')->default(0);
            $table->integer('withdraw_btn')->default(0);
            $table->integer('reinvest_btn')->default(0);
            $table->integer('reinvest_commit_btn')->default(0);
            $table->integer('commitment')->default(0);
            $table->integer('previous_investment_id')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('investments');
    }
}
