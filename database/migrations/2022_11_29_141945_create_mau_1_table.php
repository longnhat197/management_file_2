<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMau1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_1', function (Blueprint $table) {
            $table->id();

            $table->integer('detail_id');
            $table->date('date_dang_ky')->nullable();
            $table->string('so_trich_yeu')->nullable();
            $table->string('so_sua_doi')->nullable();
            $table->string('name_nha_thau')->nullable();
            $table->string('time_thuc_hien')->nullable();
            $table->string('time_hieu_luc')->nullable();
            $table->date('date_start')->nullable();
            $table->text('ten_chuc_danh')->nullable();

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
        Schema::dropIfExists('mau_1');
    }
}
