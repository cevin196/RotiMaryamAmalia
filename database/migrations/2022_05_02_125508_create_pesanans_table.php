<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nomor_pesanan');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->date('tanggal');
            $table->bigInteger('total')->default(0)->unsigned();
            $table->string('status')->default('none');
            $table->string('snap_token')->nullable();

            // from detail user
            $table->string('nama');
            $table->string('city')->nullable();
            $table->text('alamat');
            $table->string('telepon', 15);
            $table->string('email');
            $table->string('catatan')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};