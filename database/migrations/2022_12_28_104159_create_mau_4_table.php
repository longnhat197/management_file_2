<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMau4Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_4', function (Blueprint $table) {
            $table->id();
            $table->integer('detail_id');
            $table->text('thong_tin_moi_thau')->nullable();
            $table->date('ngay_phat_hanh')->nullable();
            $table->string('so_trich_yeu')->nullable();
            $table->text('thong_tin_phat_hanh')->nullable();
            $table->string('name_nha_thau')->nullable();
            $table->string('so_trich_yeu1')->nullable();
            $table->text('so_tien_bl')->nullable();
            $table->string('time')->nullable();
            $table->date('from_date')->nullable();
            $table->text('so_tien_tt')->nullable();
            $table->text('name_chuc_danh')->nullable();
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
        Schema::dropIfExists('mau_4');
    }
}
