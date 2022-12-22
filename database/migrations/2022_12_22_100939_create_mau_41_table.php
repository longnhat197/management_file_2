<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMau41Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_41', function (Blueprint $table) {
            $table->id();
            $table->integer('detail_id');
            $table->text('thong_tin_moi_thau');
            $table->date('ngay_phat_hanh');
            $table->string('so_trich_yeu');
            $table->text('thong_tin_phat_hanh');
            $table->string('name_nha_thau');
            $table->string('so_trich_yeu1');
            $table->text('so_tien_bl');
            $table->string('time');
            $table->date('from_date');
            $table->text('so_tien_tt');
            $table->string('name_lien_danh');
            $table->text('name_chuc_danh');
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
        Schema::dropIfExists('mau_41');
    }
}
