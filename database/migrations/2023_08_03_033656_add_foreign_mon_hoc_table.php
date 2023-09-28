<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignMonHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("mon_hocs", function(Blueprint $table) {
            $table->foreign("MaKhoa_ID")->references("id")->on("khoas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("mon_hocs", function(Blueprint $table) {
            $table->dropForeign("mon_hocs_makhoa_id_foreign");
        });
    }
}
