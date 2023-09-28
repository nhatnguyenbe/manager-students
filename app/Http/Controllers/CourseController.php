<?php

namespace App\Http\Controllers;

use App\Models\KhoaHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    public function index()
    {

        $courses = KhoaHoc::all();
        return View::make("courses.lists",compact("courses"));
    }

    public function add()
    {
        return View::make("courses.add");
    }
    public function handleAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "MaKhoaHoc" => "required|min:3|unique:khoa_hocs,MaKhoaHoc",
            "TenKhoaHoc" => "required|min:3",
        ],[
            "required" => ":attribute không được để trống.",
            "min" => ":attribute không nhỏ hơn :min kí tự.",
            "unique" => ":attribute đã tồn tại.",
        ],[
            "MaKhoaHoc" => "Mã khoá",
            "TenKhoaHoc" => "Tên khoá",
        ]);

        if($validator->fails()) {
            return redirect(route("dashboard.courses.add"))->withErrors($validator)->withInput();
        }
        $course = new KhoaHoc();
        $course->MaKhoaHoc = $request->MaKhoaHoc;
        $course->TenKhoaHoc = $request->TenKhoaHoc;
        $result = $course->save();
        if($result){
            Alert::success("Thông báo!", "Tạo khoá mới thành công.");
        }else {
            Alert::error("Thông báo!", "Tạo khoá mới thất bại.");
        }
        return redirect(route("dashboard.courses.index"));
    }

    public function edit(KhoaHoc $course)
    {
        return View::make("courses.edit", compact("course"));
    }

    public function handleEdit(KhoaHoc $course, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "MaKhoaHoc" => "required|min:3|unique:khoa_hocs,MaKhoaHoc,".$course->id,
            "TenKhoaHoc" => "required|min:3",
        ],[
            "required" => ":attribute không được để trống.",
            "min" => ":attribute không nhỏ hơn :min kí tự.",
            "unique" => ":attribute đã tồn tại.",
        ],[
            "MaKhoaHoc" => "Mã khoá",
            "TenKhoaHoc" => "Tên khoá",
        ]);

        if($validator->fails()) {
            return redirect(route("dashboard.courses.add"))->withErrors($validator)->withInput();
        }
        $course->MaKhoaHoc = $request->MaKhoaHoc;
        $course->TenKhoaHoc = $request->TenKhoaHoc;
        $result = $course->save();
        if($result){
            Alert::success("Thông báo!", "Cập nhật thành công.");
        }else {
            Alert::error("Thông báo!", "Cập nhật thất bại.");
        }
        return redirect(route("dashboard.courses.index"));
    }

    public function delete(KhoaHoc $course)
    {
        $lopCount = $course->lops()->count();
        if($lopCount == 0) {
            $result = KhoaHoc::destroy($course->id);
            if($result){
                Alert::success("Thông báo!", "Xoá '{$course->TenKhoaHoc}' thành công.");
            }else {
                Alert::error("Thông báo!", "Xoá '{$course->TenKhoaHoc}' thất bại.");
            }
            
        }else {
            Alert::error("Thông báo!", "Xoá '{$course->TenKhoaHoc}' thất bại. Vui lòng kiểm tra lại dữ liệu.");
        }
        return redirect(route("dashboard.courses.index"));
    }
}
