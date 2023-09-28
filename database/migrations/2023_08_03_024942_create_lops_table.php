<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lops', function (Blueprint $table) {
            $table->increments("id");
            $table->string("MaLop")->unique();
            $table->string("TenLop")->nullable();
            $table->integer("MaKhoa_ID")->unsigned();
            $table->integer("MaHeDT_ID")->unsigned();
            $table->integer("MaKhoaHoc_ID")->unsigned();
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
        Schema::dropIfExists('lops');
    }
}
