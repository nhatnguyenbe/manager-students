<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignDiemDanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("diem_danhs", function(Blueprint $table) {
            $table->foreign("MaSV")->references("id")->on("sinh_viens");
            $table->foreign("MaMH")->references("id")->on("mon_hocs");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("diem_danhs", function(Blueprint $table) {
            $table->dropForeign("diem_danhs_masv_foreign");
            $table->dropForeign("diem_danhs_mamh_foreign");
        });
    }
}
