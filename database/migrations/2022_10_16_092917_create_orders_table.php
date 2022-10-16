<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_id')->unique();
            $table->string('user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('mobile');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->tinyInteger('staus')->default(0);
            $table->string('message')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
