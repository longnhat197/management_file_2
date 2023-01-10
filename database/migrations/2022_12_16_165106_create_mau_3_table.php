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
            $table->integer('detail_id')->nullable();
            $table->date('ngay_lam_giay')->nullable();
            $table->string('noi_lam_thoa_thuan')->nullable();
            $table->string('can_cu')->nullable();
            $table->string('can_cu1')->nullable();
            $table->date('date_hsmt')->nullable();
            $table->text('ten_thanh_vien')->nullable();
            $table->string('name_dai_dien')->nullable();
            $table->string('chuc_vu')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('dien_thoai')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('tai_khoan')->nullable();
            $table->string('ma_so_thue')->nullable();
            $table->string('so_uy_quyen')->nullable();
            $table->date('date_uq')->nullable();
            $table->string('name_lien_danh')->nullable();
            $table->text('table_content')->nullable();
            $table->text('hinh_thuc_khac')->nullable();
            $table->string('name_mot_ben')->nullable();
            $table->text('noi_dung_khac')->nullable();
            $table->integer('total')->nullable();
            $table->integer('moi_ben_giu')->nullable();
            $table->text('chu_ky_dung_dau')->nullable();
            $table->text('chu_ky_thanh_vien')->nullable();
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
