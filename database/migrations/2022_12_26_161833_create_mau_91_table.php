<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMau91Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_91', function (Blueprint $table) {
            $table->id();
            $table->integer('detail_id');
            $table->date('date')->nullable();
            $table->string('name_nha_thau')->nullable();
            $table->string('name_thanh_vien_lien_danh')->nullable();
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
        Schema::dropIfExists('mau_91');
    }
}
