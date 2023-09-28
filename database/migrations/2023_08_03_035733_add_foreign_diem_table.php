<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignDiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("diems", function(Blueprint $table) {
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
        Schema::table("diems", function(Blueprint $table) {
            $table->dropForeign("diems_masv_foreign");
            $table->dropForeign("diems_mamh_foreign");
        });
    }
}
