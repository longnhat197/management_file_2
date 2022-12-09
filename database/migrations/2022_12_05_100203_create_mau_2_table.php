<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMau2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_2', function (Blueprint $table) {
            $table->id();

            $table->integer('detail_id');
            $table->string('noi_lam_giay')->nullable();
            $table->date('date')->nullable();
            $table->text('thong_tin_dai_dien')->nullable();
            $table->string('name_nha_thau')->nullable();
            $table->string('dia_chi_nha_thau')->nullable();
            $table->text('thong_tin_nguoi_duoc_uy_quyen')->nullable();
            $table->string('name_dai_dien')->nullable();
            $table->string('name_uy_quyen')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->integer('total')->nullable();
            $table->integer('uq_giu')->nullable();
            $table->integer('duq_giu')->nullable();
            $table->integer('moi_thau_giu')->nullable();
            $table->text('chu_ky_duq')->nullable();
            $table->text('chu_ky_uq')->nullable();


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
        Schema::dropIfExists('mau_2');
    }
}
