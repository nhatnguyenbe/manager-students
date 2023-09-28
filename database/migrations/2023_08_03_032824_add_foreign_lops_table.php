<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignLopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("lops", function(Blueprint $table) {
            $table->foreign("MaKhoa_ID")->references("id")->on("khoas");
            $table->foreign("MaHeDT_ID")->references("id")->on("he_dao_taos");
            $table->foreign("MaKhoaHoc_ID")->references("id")->on("khoa_hocs");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("lops", function(Blueprint $table) {
            $table->dropForeign("lops_makhoa_id_foreign");
            $table->dropForeign("lops_mahedt_id_foreign");
            $table->dropForeign("lops_makhoahoc_id_foreign");
        });
    }
}
