<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->increments("id");
            $table->string("MaSV")->unique();
            $table->string("TenSV")->nullable();
            $table->tinyInteger("GioiTinh")->nullable();
            $table->date("NgaySinh")->nullable();
            $table->string("email",50)->nullable();
            $table->string("cccd",12)->nullable();
            $table->integer("MaLop_ID")->unsigned();
            // $table->integer("MaKhoa_ID")->unsigned();
            // $table->integer("MaHeDT_ID")->unsigned();
            $table->date("NamNH")->nullable();
            $table->date("NamKT")->nullable();
            $table->string("DienThoai", 14)->nullable();
            $table->string("NoiSinh", 150)->nullable();
            $table->string("QueQuan", 150)->nullable();
            $table->string("DanToc", 50)->nullable();
            $table->string("TonGiao", 20)->nullable();
            $table->string("image", 250)->nullable();
            $table->integer("status")->default(1);
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
        Schema::dropIfExists('sinh_viens');
    }
}
