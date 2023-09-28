<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\HeDaoTao;
use App\Models\Khoa;
use App\Models\KhoaHoc;
use App\Models\Lops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class ClassroomController extends Controller
{
    public function index()
    {
        $classroom = Lops::all();
        return View::make("classroom.lists", compact("classroom"));
    }

    public function add()
    {
        $khoas = Khoa::all();
        $hedaotaos = HeDaoTao::all();
        $thuockhoas = KhoaHoc::all();
        return View::make("classroom.add", compact("khoas", "hedaotaos", "thuockhoas"));
    }
    public function handleAdd(ClassroomRequest $request)
    {
        $class = new Lops();
        $class->MaLop = $request->input("MaLop");
        $class->TenLop = $request->input("TenLop");
        $class->MaKhoa_ID = $request->input("MaKhoa_ID");
        $class->MaHeDT_ID = $request->input("MaHeDT_ID");
        $class->MaKhoaHoc_ID = $request->input("MaKhoaHoc_ID");
        $result = $class->save();
        if($result){
            Alert::success("Thông báo!", "Tạo lớp mới thành công.");
        }else {
            Alert::error("Thông báo!", "Tạo lớp mới thất bại.");
        }
        return redirect(route("dashboard.classroom.index"));
    }

    public function edit(Lops $class)
    {
        $khoas = Khoa::all();
        $hedaotaos = HeDaoTao::all();
        $thuockhoas = KhoaHoc::all();
        return View::make("classroom.edit", compact("khoas", "hedaotaos", "thuockhoas", "class"));
    }

    public function handleEdit(Lops $class, ClassroomRequest $request)
    {
        $class->MaLop = $request->input("MaLop");
        $class->TenLop = $request->input("TenLop");
        $class->MaKhoa_ID = $request->input("MaKhoa_ID");
        $class->MaHeDT_ID = $request->input("MaHeDT_ID");
        $class->MaKhoaHoc_ID = $request->input("MaKhoaHoc_ID");
        $result = $class->save();
        if($result){
            Alert::success("Thông báo!", "Cập nhật lớp mới thành công.");
        }else {
            Alert::error("Thông báo!", "Cập nhật lớp mới thất bại.");
        }
        return redirect(route("dashboard.classroom.index"));
    }

    public function delete(Lops $class)
    {
        $sinhvienCount = $class->sinhvien()->count();
        // dd($sinhvienCount);
        if($sinhvienCount == 0) {
            $result = Lops::destroy($class->id);
            if($result){
                Alert::success("Thông báo!", "Xoá '{$class->TenLop}' thành công.");
            }else {
                Alert::error("Thông báo!", "Xoá '{$class->TenLop}' thất bại.");
            }
            
        }else {
            Alert::error("Thông báo!", "Xoá '{$class->TenLop}' thất bại. Vui lòng kiểm tra lại dữ liệu.");
        }
        return redirect(route("dashboard.classroom.index"));
    }
}