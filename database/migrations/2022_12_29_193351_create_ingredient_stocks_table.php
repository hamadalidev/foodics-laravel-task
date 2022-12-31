<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->double('remaining_quantity')->comment('remaining stock of ingredient. quantity in grams');
            $table->double('total_quantity')->comment('total stock of ingredient. quantity in grams');
            $table->enum('notification_status', ['send', 'not_send'])->comment('single time email send, send status show alert email sended, not_send status show alert email not sended, if change when stock refill');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_stocks');
    }
};
