<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('menu_pesanan', function (Blueprint $table) {
            $table->foreignId('menu_id')->constrained();
            $table->foreignId('pesanan_id')->constrained();
            $table->integer('qty');
        });
    }

    public function down()
    {
        //
    }
};