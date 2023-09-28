<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Http\Requests\StudentRequest;
use App\Models\HeDaoTao;
use App\Models\Khoa;
use App\Models\Lops;
use App\Models\SinhViens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        $classroom = Lops::all();
        $departments = Khoa::all();
        $students = SinhViens::latest()->
        join("lops", "sinh_viens.MaLop_ID", "=", "lops.id")
        ->join("khoas", "lops.MaKhoa_ID", "=", "khoas.id")
        ->selectRaw(
            "sinh_viens.* , khoas.TenKhoa"
        )->paginate(10);
        return view('students.lists', compact("students", "classroom", "departments"));
    }
    public function search(Request $request)
    {
        $students = SinhViens::
        join("lops", "sinh_viens.MaLop_ID", "=", "lops.id")->join("khoas", "lops.MaKhoa_ID", "=", "khoas.id")->selectRaw("sinh_viens.* , khoas.TenKhoa");
        if($request->has("_name") && $request->_name) {
            $students = $students->where("sinh_viens.TenSV", 'like', "%{$request->_name}%");
        }
        if($request->has("_code") && $request->_code){
            $students = $students->where("sinh_viens.MaSV", "like", "%{$request->_code}%");
        }
        if($request->has("_date") && $request->_date) {
            $students = $students->where("sinh_viens.NgaySinh", "like", "%{$request->_date}%");
        }

        if($request->has("_class") && $request->_class) {
            $students = $students->where("sinh_viens.MaLop_ID", $request->_class);
        }

        if($request->has("_depart") && $request->_depart) {
            $students = $students->where("khoas.id", $request->_depart);
        }
        if($request->has("status") && $request->status) {
            $students = $students->where("sinh_viens.status", $request->status);
        }
        
        $students = $students->paginate(10);
        if($students->count() >= 1){
            return view("students.search", compact('students'))->render();
        }else {
            return response()->json([
                'status' => "false",
                "message" => "Không có dữ liệu",
            ]);
        }

    }
    public function add()
    {
        $classroom = Lops::all();
        $departments = Khoa::all();
        $trainings = HeDaoTao::all();
        return view('students.add', compact("classroom", "departments", "trainings"));    
    }
    

    public function handleAdd(StudentRequest $request)
    {
        $student = new SinhViens();
        $student->MaSV = $request->MaSV;
        $student->TenSV = $request->TenSV;
        $student->NgaySinh = $request->NgaySinh;
        $student->GioiTinh = $request->GioiTinh;
        $student->NoiSinh = $request->NoiSinh;
        $student->QueQuan = $request->QueQuan;
        $student->DanToc = $request->DanToc;
        $student->MaLop_ID = $request->MaLop_ID;
        $student->TonGiao = $request->TonGiao;
        $student->NamNH = $request->NamNH;
        $student->cccd = $request->cccd;
        $student->DienThoai = $request->DienThoai;
        $student->email = $request->email;
        if($request->file("image")){
            $extends = $request->image->extension();
            $newName = sha1(uniqid()).".{$extends}";
            $request->image->move(public_path("images"), $newName);
            $student->image = $newName;
        }
        $result  = $student->save();
        if($result){
            Alert::success("Thông báo!", "Thêm sinh viên mới thành công.");
        }else {
            Alert::error("Thông báo!", "Thêm sinh viên mới thất bại.");
        }
        return redirect()->route("dashboard.students.index");
    }

    public function edit(SinhViens $student)
    {
        $classroom = Lops::all();
        return view('students.edit', compact("classroom", "student"));
    }

    public function handleEdit(SinhViens $student, StudentRequest $request)
    {
        $student->MaSV = $request->MaSV;
        $student->TenSV = $request->TenSV;
        $student->NgaySinh = $request->NgaySinh;
        $student->GioiTinh = $request->GioiTinh;
        $student->NoiSinh = $request->NoiSinh;
        $student->QueQuan = $request->QueQuan;
        $student->DanToc = $request->DanToc;
        $student->MaLop_ID = $request->MaLop_ID;
        $student->TonGiao = $request->TonGiao;
        $student->NamNH = $request->NamNH;
        if($request->NamKT){
            $student->NamKT = $request->NamKT;
        }
        $student->cccd = $request->cccd;
        $student->DienThoai = $request->DienThoai;
        $student->email = $request->email;
        if($request->file("image")){
            if($student->image) {
                if(file_exists(public_path("images/{$student->image}"))) {
                    unlink(public_path("images/{$student->image}"));
                }
            }
            $extends = $request->image->extension();
            $newName = sha1(uniqid()).".{$extends}";
            $request->image->move(public_path("images"), $newName);
            $student->image = $newName;
        }    
        $student->status = $request->status;
        $result  = $student->save();
        if($result){
            Alert::success("Thông báo!", "Cập nhật sinh viên thành công.");
        }else {
            Alert::error("Thông báo!", "Cập nhật sinh viên thất bại.");
        }
        return redirect()->route("dashboard.students.index");
    }

    public function view(Request $request)
    {
        $student = SinhViens::join("lops", "sinh_viens.MaLop_ID", "=" , "lops.id")->find($request->id);
        return $student;
    }

    public function delete(SinhViens $student)
    {
        $diemCount = $student->diems()->count();
        $diemdanhCount =  $student->diemdanhs()->count();
        if($diemdanhCount == 0 && $diemCount == 0)  {
            $result = SinhViens::destroy($student->id);
            if($result) {
                Alert::success('Thông báo!', 'Xoá sinh viên thành công.');
            }else {
                Alert::error('Thông báo!', 'Xoá sinh viên thất bại.');
            }     
        }else {
            Alert::error('Bạn không thể xoá!', 'Xoá sinh viên thất bại. Vui lòng thực hiện lại sau.');
        } 
        return redirect(route("dashboard.students.index"));
    }
    

    public function export()
    {
        return Excel::download(new StudentExport, "student.xlsx",\Maatwebsite\Excel\Excel::XLSX);
    }
}