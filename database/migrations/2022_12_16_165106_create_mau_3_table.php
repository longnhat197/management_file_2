<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMau3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_3', function (Blueprint $table) {
            $table->id();
            $table->integer('detail_id');
            $table->date('ngay_lam_giay');
            $table->string('noi_lam_thoa_thuan');
            $table->string('can_cu');
            $table->string('can_cu1');
            $table->date('date_hsmt');
            $table->text('ten_thanh_vien');
            $table->string('name_dai_dien');
            $table->string('chuc_vu');
            $table->string('dia_chi');
            $table->string('dien_thoai');
            $table->string('fax');
            $table->string('email');
            $table->string('tai_khoan');
            $table->string('ma_so_thue');
            $table->string('so_uy_quyen');
            $table->date('date_uq');
            $table->string('name_lien_danh');
            $table->text('table_content');
            $table->text('hinh_thuc_khac');
            $table->string('name_mot_ben');
            $table->text('noi_dung_khac');
            $table->integer('total');
            $table->integer('moi_ben_giu');
            $table->text('chu_ky_dung_dau');
            $table->text('chu_ky_thanh_vien');
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
        Schema::dropIfExists('mau_3');
    }
}
