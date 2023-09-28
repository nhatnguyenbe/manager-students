<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    public function index()
    {
        $khoas = Khoa::all();
        return View::make("khoas.lists", compact("khoas"));
    }

    public function add()
    {
        return View::make("khoas.add");
    }

    public function handleAdd(Request $request)
    {

        $rules = [
            "MaKhoa" => 'required|min:6|unique:khoas,MaKhoa',
            "TenKhoa" => 'required|min:6',
        ];
        if($request->DienThoai) {
            $rules["DienThoai"] = "numeric|min:10";
        }
        if($request->ThanhLap) {
            $rules["ThanhLap"] = "date";
        }
        $message = [
            "required" => ":attribute bắt buộc nhập.",
            "min" => ":attribute phải lớn hơn :min kí tự.",
            "unique" => ":attribute đã tồn tại.",
            "numeric" => ":attribute không đúng định dạng.",
            "date" => ":attribute không đúng định dạng.",
        ];
        $attribute = [
            "MaKhoa" => "Mã khoa",
            "TenKhoa" => "Tên khoa",
            "DienThoai" => "Số điện thoại",
            "ThanhLap" => "Năm thành lập",
        ];
        $validator = Validator::make($request->all(), $rules,$message, $attribute);
        if($validator->fails()){
            return redirect()->route("dashboard.department.add")->withInput()->withErrors($validator);
        }
        $khoa = new Khoa();
        $khoa->MaKhoa = $request->MaKhoa;
        $khoa->TenKhoa = $request->TenKhoa;
        if($request->DienThoai) {
            $khoa->DienThoai = $request->DienThoai;
        }
        if($request->ThanhLap) {
            $khoa->ThanhLap = $request->ThanhLap;
        }else {
            $khoa->ThanhLap = date_format(date_create(), "Y-m-d h:i:s");
        }
        $result = $khoa->save();
        if($result) {
            Alert::success("Thông báo!", "Bạn đã thêm thành công");
        }else {
            Alert::error("Thông báo", "Thêm khoa thất bại, Vui lòng thử lại.");
        }

        return redirect(route("dashboard.department.index"));
    }

    public function edit(Khoa $khoa, Request $request)
    {
        return View::make("khoas.edit", compact("khoa"));
    }

    public function handleEdit(Khoa $khoa, Request $request)
    {
        $rules = [
            "MaKhoa" => 'required|min:6|unique:khoas,MaKhoa,'.$khoa->id,
            "TenKhoa" => 'required|min:6',
        ];
        if($request->DienThoai) {
            $rules["DienThoai"] = "numeric|min:10";
        }
        if($request->ThanhLap) {
            $rules["ThanhLap"] = "date";
        }
        $message = [
            "required" => ":attribute bắt buộc nhập.",
            "min" => ":attribute phải lớn hơn :min kí tự.",
            "unique" => ":attribute đã tồn tại.",
            "numeric" => ":attribute không đúng định dạng.",
            "date" => ":attribute không đúng định dạng.",
        ];
        $attribute = [
            "MaKhoa" => "Mã khoa",
            "TenKhoa" => "Tên khoa",
            "DienThoai" => "Số điện thoại",
            "ThanhLap" => "Năm thành lập",
        ];
        $validator = Validator::make($request->all(), $rules,$message, $attribute);
        if($validator->fails()){
            return redirect()->route("dashboard.department.edit")->withInput()->withErrors($validator);
        }
        $khoa->MaKhoa = $request->MaKhoa;
        $khoa->TenKhoa = $request->TenKhoa;
        if($request->DienThoai) {
            $khoa->DienThoai = $request->DienThoai;
        }
        if($request->ThanhLap) {
            $khoa->ThanhLap = $request->ThanhLap;
        }
        $result = $khoa->save();
        if($result) {
            Alert::success("Thông báo!", "Cập nhập khoa thành công");
        }else {
            Alert::error("Thông báo", "Cập nhập khoa thất bại, Vui lòng thử lại.");
        }

        return redirect(route("dashboard.department.index"));
    }

    public function delete(Khoa $khoa)
    {
        $sinhvienCount = $khoa->sinhvien()->count();
        $lopCount = $khoa->lops()->count();
        $monhocCount = $khoa->lops()->count();
        if($sinhvienCount == 0 && $lopCount == 0 && $monhocCount == 0) {
            $result = Khoa::destroy($khoa->id);
            if($result) {
                Alert::success("Thông báo!", "Xoá khoa thành công");
            }else {
                Alert::error("Thông báo", "Xoá khoa thất bại, Vui lòng thử lại.");
            }
        }else {
            Alert::error("Thông báo", "Xoá khoa thất bại, Vui lòng kiểm tra lại dữ liệu hệ thống.");
        }
        return redirect(route("dashboard.department.index"));
    }
}