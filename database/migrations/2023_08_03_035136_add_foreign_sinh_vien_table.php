<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignSinhVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("sinh_viens", function(Blueprint $table) {
            $table->foreign("MaLop_ID")->references("id")->on("lops");
            // $table->foreign("MaKhoa_ID")->references("id")->on("khoas");
            // $table->foreign("MaHeDT_ID")->references("id")->on("he_dao_taos");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("sinh_viens", function(Blueprint $table) {
            $table->dropForeign("sinh_viens_malop_id_foreign");
            // $table->dropForeign("sinh_viens_makhoa_id_foreign");
            // $table->dropForeign("sinh_viens_mahedt_id_foreign");
        });
    }
}
