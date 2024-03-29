<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMau162Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_162', function (Blueprint $table) {
            $table->id();
            $table->integer('detail_id');
            $table->string('so_trich_yeu')->nullable();
            $table->date('date')->nullable();
            $table->string('name_nha_thau')->nullable();
            $table->text('so_tien')->nullable();
            $table->text('so_tien_giam_gia')->nullable();
            $table->text('gia_tri_giam_gia')->nullable();
            $table->string('time')->nullable();
            $table->date('dateStart')->nullable();
            $table->text('name_chuc_danh')->nullable();
            $table->string('so_sua_doi')->nullable();
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
        Schema::dropIfExists('mau_162');
    }
}
