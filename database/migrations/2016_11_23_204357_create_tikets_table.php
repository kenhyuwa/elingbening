<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->char('no_tiket', 6)->primary('no_tiket');
            $table->string('nama');
            $table->string('alamat');
            // $table->unsignedInteger('jumlah', 5)->increments(false);
            $table->timestamp('tanggal');
            // $table->unsignedInteger('tahun', 4)->increments(false);
            $table->char('phone', 20);
            // $table->unsignedInteger('price', 20)->increments(false);
            // $table->unsignedInteger('total', 20)->increments(false);
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
        Schema::dropIfExists('tikets');
    }
}
