<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diems', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("MaSV")->unsigned();
            $table->integer("MaMH")->unsigned();
            $table->integer("LanThi")->default(1);
            $table->integer("DiemCC")->nullable();
            $table->integer("DiemGK")->nullable();
            $table->integer("DiemCK")->nullable();
            $table->string("DiemHS10", 10)->nullable();
            $table->string("DiemHS4", 10)->nullable();
            $table->string("DiemAlphabet", 10)->nullable();
            $table->integer("HocLai")->default(0);
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
        Schema::dropIfExists('diems');
    }
}