<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('package_id');
            $table->unsignedInteger('depositor_investment_id');
            $table->unsignedInteger('recipient_investment_id');
            $table->unsignedInteger('depositor_id');
            $table->integer('recipient_id');
            $table->unsignedInteger('withdrawal_id');
            $table->integer('amount');
            $table->string('proof_of_payment')->nullable();
            $table->integer('depositor_status')->default(0);
            $table->integer('recipient_status')->default(0);
            $table->string('deadline');
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
        Schema::dropIfExists('transactions');
    }
}
