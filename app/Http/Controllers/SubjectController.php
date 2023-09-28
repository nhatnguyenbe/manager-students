<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Khoa;
use App\Models\MonHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = MonHoc::all();
        return View::make("subjects.lists", compact("subjects"));
    }

    public function add()
    {
        $departments = Khoa::all();
        return View::make("subjects.add", compact("departments"));
    }

    public function handleAdd(SubjectRequest $request)
    {
        $subject = new MonHoc();
        $subject->MaMH = $request->MaMH;
        $subject->TenMH = $request->TenMH;
        $subject->SoTc = $request->SoTc;
        $subject->SoTiet = $request->SoTiet;
        $subject->MaKhoa_ID = $request->MaKhoa_ID;
        $result = $subject->save();
        if($result){
            Alert::success("Thông báo!", "Thêm mới môn học thành công.");
        }else {
            Alert::error("Thông báo!", "Thêm mới môn học thất bại.");
        }
        return redirect(route("dashboard.subjects.index"));
    }

    public function edit(MonHoc $subject)
    {
        $departments = Khoa::all();
        return View::make("subjects.edit", compact("subject", "departments"));
    }

    public function handleEdit(MonHoc $subject, SubjectRequest $request)
    {
        $subject->MaMH = $request->MaMH;
        $subject->TenMH = $request->TenMH;
        $subject->SoTc = $request->SoTc;
        $subject->SoTiet = $request->SoTiet;
        $subject->MaKhoa_ID = $request->MaKhoa_ID;
        $result = $subject->save();
        if($result){
            Alert::success("Thông báo!", "Cập nhật môn học thành công.");
        }else {
            Alert::error("Thông báo!", "Cập nhật môn học thất bại.");
        }
        return redirect(route("dashboard.subjects.index"));
    }

    public function delete(MonHoc $subject)
    {
        $diems = $subject->diem()->count();
        $diemsdanh = $subject->diemdanhs()->count();
        if($diemsdanh == 0 && $diemsdanh == 0) {
            $result = MonHoc::destroy($subject->id);
            if($result) {
                Alert::success("Thông báo!", "Xoá môn học thành công");
            }else {
                Alert::error("Thông báo", "Xoá môn học thất bại, Vui lòng thử lại.");
            }
        }else {
            Alert::error("Thông báo", "Xoá môn học thất bại, Vui lòng kiểm tra lại dữ liệu hệ thống.");
        }
        return redirect(route("dashboard.subjects.index"));
    }
}