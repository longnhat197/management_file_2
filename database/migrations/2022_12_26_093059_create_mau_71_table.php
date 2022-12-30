<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMau71Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_71', function (Blueprint $table) {
            $table->id();
            $table->integer('detail_id');
            $table->string('name_nha_thau')->nullable();
            $table->date('ngay_lam_giay')->nullable();
            $table->string('name_thanh_vien_lien_danh')->nullable();
            $table->integer('check')->nullable();
            $table->text('table_content')->nullable();
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
        Schema::dropIfExists('mau_71');
    }
}
