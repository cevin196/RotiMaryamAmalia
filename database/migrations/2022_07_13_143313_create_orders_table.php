<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_number');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->date('date');
            $table->foreignId('city_id');
            $table->bigInteger('total')->default(0)->unsigned();
            $table->string('status')->default('none');
            $table->string('snap_token')->nullable();

            // detail user
            $table->string('name');
            $table->text('address');
            $table->string('phone_number', 15);
            $table->string('email');
            $table->string('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};