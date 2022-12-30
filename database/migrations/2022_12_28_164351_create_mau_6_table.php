<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMau6Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_6', function (Blueprint $table) {
            $table->id();
            $table->integer('detail_id');
            $table->string('name_nha_thau')->nullable();
            $table->date('ngay_lam_giay')->nullable();
            $table->integer('check')->nullable();
            $table->string('nam')->nullable();
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
        Schema::dropIfExists('mau_6');
    }
}
