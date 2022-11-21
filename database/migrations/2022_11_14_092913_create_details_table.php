<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('name_goi_thau');
            $table->string('name_du_an');
            $table->string('so_thong_bao');
            $table->string('name_moi_thau');
            $table->integer('hinh_thuc_thau');
            $table->integer('hinh_thuc_tham_du');
            $table->integer('uy_quyen');
            $table->date('time_phat_hanh');
            $table->dateTime('time_mo_thau');
            $table->dateTime('time_dong_thau');


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
        Schema::dropIfExists('details');
    }
}
