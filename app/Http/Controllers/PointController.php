<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointRequest;
use App\Models\Diems;
use App\Models\Khoa;
use App\Models\Lops;
use App\Models\MonHoc;
use App\Models\SinhViens;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PointController extends Controller
{
    public static $_page = 7;
    public function index(Request $request)
    {
        $subjects = MonHoc::all();
        $points = Diems::join("sinh_viens", "diems.MaSV", "=", "sinh_viens.id")
        ->selectRaw("diems.* , sinh_viens.MaSV as MaSinhVien, sinh_viens.TenSV as TenSinhVien");
        if($request->has("name") && $request->name) {
            $points->where("sinh_viens.TenSV", "like", "%{$request->name}%");
        }
        if($request->has("code") && $request->code) {
            $points->where("sinh_viens.MaSV", "{$request->code}");
        }
        if($request->has("yeah") && $request->yeah) {
            $points->where("NamHoc", "{$request->yeah}");
        }
        if($request->has("subject") && $request->subject) {
            $points->where("diems.MaMH", "{$request->subject}");
        }
        $points = $points->paginate(self::$_page)->withQueryString();
        return view("points.lists", compact("points", "subjects"));
    }

    public function add()
    {
        $departments = Khoa::all();
        return view("points.add", compact("departments"));
    }

    public function handleAdd(PointRequest $request)
    {
        $point = new Diems();
        $point->MaSV = $request->MaSV;
        $point->MaMH = $request->MaMH;
        $point->NamHoc = $request->NamHoc;
        $point->HocKi = $request->HocKi;
        $point->DiemCC = $request->DiemCC;
        $point->DiemGK = $request->DiemGK;
        $point->DiemCK = $request->DiemCK;

        // diem hs10
        $DiemHS10 = (($request->DiemCC * 0.1) + ($request->DiemGK * 0.4) + ($request->DiemCK * 0.6));
        $point->DiemHS10 = $DiemHS10;
        // diem hs4
        $DiemHS4 = 0;
        $DiemAlphabet = "F";
        $DanhGia = 0;
        if($DiemHS10 < 4.0) {
            $DiemHS4 = 0;
            $DiemAlphabet = "F";
            $DanhGia = 0;
        }elseif($DiemHS10 >= 4.0 && $DiemHS10 <= 4.9) {
            $DiemHS4 = 1.0;
            $DiemAlphabet = "D";
            $DanhGia = 1;
        }elseif($DiemHS10 >= 5.0 && $DiemHS10 <= 5.4){
            $DiemHS4 = 1.5;
            $DiemAlphabet = "D+";
            $DanhGia = 1;
        }elseif($DiemHS10 >= 5.5 && $DiemHS10 <= 6.4){
            $DiemHS4 = 2.0;
            $DiemAlphabet = "C";
            $DanhGia = 1;
        }elseif($DiemHS10 >= 6.5 && $DiemHS10 <= 6.9){
            $DiemHS4 = 2.5;
            $DiemAlphabet = "C+";
            $DanhGia = 1;
        }elseif($DiemHS10 >= 7.0 && $DiemHS10 <= 7.9){
            $DiemHS4 = 3.0;
            $DiemAlphabet = "B";
            $DanhGia = 1;
        }elseif($DiemHS10 >= 8.0 && $DiemHS10 <= 8.4){
            $DiemHS4 = 3.5;
            $DiemAlphabet = "B+";
            $DanhGia = 1;
        }elseif($DiemHS10 >= 8.5 && $DiemHS10 <= 8.9){
            $DiemHS4 = 3.7;
            $DiemAlphabet = "A";
            $DanhGia = 1;
        }
        elseif($DiemHS10 >= 9.0 && $DiemHS10 <= 10){
            $DiemHS4 = 4;
            $DiemAlphabet = "A+";
            $DanhGia = 1;
        }

        $point->DiemHS4 = $DiemHS4;
        $point->DiemAlphabet = $DiemAlphabet;
        $point->DanhGia = $DanhGia;
        $result = $point->save();
        if($result) {
            Alert::success("Thông báo!", "Tạo bảng điểm cho sinh viên thành công");
        }else {
            Alert::error("Thông báo!", "Tạo bảng điểm cho sinh viên thất bại");
        }
        return redirect()->route("dashboard.points.index");
    }

    public function getDepartment(Request $request)
    {
        $data["classroom"] = Lops::where("MaKhoa_ID", $request->MaKhoa)->get();
        $data["subjects"] = MonHoc::where("MaKhoa_ID", $request->MaKhoa)->get(["id", "MaMH", "TenMH"]);
        return $data;
    }

    public function fetchStudent(Request $request)
    {
        $data["student"] = SinhViens::where("MaLop_ID", $request->MaLop)->get(["id", "MaSV", "TenSV"]);
        return $data;
    }

    public function edit(Diems $point)
    {
        return view("points.edit", compact("point"));
    }

    public function handleEdit(Diems $point, PointRequest $request)
    {
        $point->NamHoc = $request->NamHoc;
        $point->HocKi = $request->HocKi;
        $point->DiemCC = $request->DiemCC;
        $point->DiemGK = $request->DiemGK;
        if($request->LanThi == null){
            $point->LanThi = 1;
        }else {
            $point->LanThi = $request->LanThi;
        }
        $point->DiemCK = $request->DiemCK;
        
        // diem hs10
        $DiemHS10 = (($request->DiemCC * 0.1) + ($request->DiemGK * 0.4) + ($request->DiemCK * 0.6));
        $point->DiemHS10 = $DiemHS10;
        // diem hs4
        $DiemHS4 = 0;
        $DiemAlphabet = "F";
        $DanhGia = 0;
        if($DiemHS10 < 4.0) {
            $DiemHS4 = 0;
            $DiemAlphabet = "F";
            $DanhGia = 0;
        }elseif($DiemHS10 >= 4.0 && $DiemHS10 <= 4.9) {
            $DiemHS4 = 1.0;
            $DiemAlphabet = "D";
            $DanhGia = 1;
        }elseif($DiemHS10 >= 5.0 && $DiemHS10 <= 5.4){
            $DiemHS4 = 1.5;
            $DiemAlphabet = "D+";
            $DanhGia = 1;
        }elseif($DiemHS10 >= 5.5 && $DiemHS10 <= 6.4){
            $DiemHS4 = 2.0;
            $DiemAlphabet = "C";
            $DanhGia = 1;
        }elseif($DiemHS10 >= 6.5 && $DiemHS10 <= 6.9){
            $DiemHS4 = 2.5;
            $DiemAlphabet = "C+";
            $DanhGia = 1;
        }elseif($DiemHS10 >= 7.0 && $DiemHS10 <= 7.9){
            $DiemHS4 = 3.0;
            $DiemAlphabet = "B";
            $DanhGia = 1;
        }elseif($DiemHS10 >= 8.0 && $DiemHS10 <= 8.4){
            $DiemHS4 = 3.5;
            $DiemAlphabet = "B+";
            $DanhGia = 1;
        }elseif($DiemHS10 >= 8.5 && $DiemHS10 <= 8.9){
            $DiemHS4 = 3.7;
            $DiemAlphabet = "A";
            $DanhGia = 1;
        }
        elseif($DiemHS10 >= 9.0 && $DiemHS10 <= 10){
            $DiemHS4 = 4;
            $DiemAlphabet = "A+";
            $DanhGia = 1;
        }

        $point->DiemHS4 = $DiemHS4;
        $point->DiemAlphabet = $DiemAlphabet;
        $point->DanhGia = $DanhGia;
        $result = $point->save();
        if($result) {
            Alert::success("Thông báo!", "Cập nhật bảng điểm thành công");
        }else {
            Alert::error("Thông báo!", "Cập nhật bảng điểm thất bại");
        }
        return redirect()->route("dashboard.points.index");
    }

    public function view(Diems $point)
    {
        $point = Diems::latest()->join("sinh_viens", "diems.MaSV", "=", "sinh_viens.id")->join("lops", "sinh_viens.MaLop_ID", "=", "lops.id")->selectRaw("diems.*, lops.TenLop")->find($point->id);
        return view("points.view", compact('point'));
    }

    public function detail()
    {
        return view("points.detail");
    }
    public function getDetail(Request $request)
    {
        if($request->has("masv") && $request->masv) {
            $student = SinhViens::select("id", "TenSV")->where("MaSV", "{$request->masv}")->first();
            if($student){
                $points = Diems::join("mon_hocs", "diems.MaMH", "=", "mon_hocs.id")
                ->selectRaw("diems.*, mon_hocs.MaMH, mon_hocs.TenMH,  mon_hocs.SoTc")
                ->where("MaSV", $student->id)->get();
                if($points->count() > 0) {
                    return view("points.result", compact("student", "points"))->render();
                }else{
                    return response()->json([
                        'status' => "false",
                        "type" => "primary",
                        "message" => "Hiện tại chưa có bảng điểm cho sinh viên {$student->TenSV}.",
                    ]);
                }
            }else {
                return response()->json([
                    'status' => "false",
                    "type" => "danger",
                    "message" => "Không tồn tại mã sinh viên.",
                ]);
            }
            
        }else {
            return response()->json([
                'status' => "false",
                "type" => "danger",
                "message" => "Vui lòng nhập mã sinh viên.",
            ]);
        }
    }
    public function delete(Diems $point)
    {
        $result = Diems::destroy($point->id);
        if($result) {
            Alert::success("Thông báo!", "Xoá bảng điểm thành công.");
        }else {
            Alert::error("Thông báo!", "Xoá bảng điểm thất bại.");
        }
        return redirect()->route("dashboard.points.index");
    }

}
