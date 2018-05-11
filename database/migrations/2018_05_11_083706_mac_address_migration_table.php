<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MacAddressMigrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mac_address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mac_address');
            $table->string('nama_komputer');
            $table->tinyInteger('tipe_akses')->default(0);
            $table->tinyInteger('aktif')->default(1);
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
        Schema::dropIfExists('mac_address');
    }
}
