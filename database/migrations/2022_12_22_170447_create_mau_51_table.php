<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMau51Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_51', function (Blueprint $table) {
            $table->id();
            $table->integer('detail_id');
            $table->date('ngay_ke_khai')->nullable();
            $table->string('so_hieu')->nullable();
            $table->string('trang')->nullable();
            $table->string('tren_trang')->nullable();
            $table->string('name_lien_danh')->nullable();
            $table->string('name_thanh_vien_lien_danh')->nullable();
            $table->string('quoc_gia_dang_ky')->nullable();
            $table->string('nam_thanh_lap')->nullable();
            $table->string('dia_chi_hop_phap')->nullable();
            $table->string('name_thanh_vien')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->string('email')->nullable();

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
        Schema::dropIfExists('mau_51');
    }
}
