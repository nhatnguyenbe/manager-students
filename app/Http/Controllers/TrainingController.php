<?php

namespace App\Http\Controllers;

use App\Models\HeDaoTao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = HeDaoTao::all();
        return View::make("trainings.lists", compact("trainings"));
    }
    
    public function add()
    {
        return View::make("trainings.add");
    }

    
    public function handleAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "MaHeDT" => "required|min:3|unique:he_dao_taos,MaHeDT",
            "TenHeDT" => "required|min:3",
        ],[
            "required" => ":attribute không được để trống.",
            "min" => ":attribute không nhỏ hơn :min kí tự.",
            "unique" => ":attribute đã tồn tại.",
        ],[
            "MaHeDT" => "Mã hệ đào tạo",
            "TenHeDT" => "Tên hệ đào tạo",
        ]);

        if($validator->fails()) {
            return redirect(route("dashboard.trainings.add"))->withErrors($validator)->withInput();
        }
        $training = new HeDaoTao();
        $training->MaHeDT = $request->MaHeDT;
        $training->TenHeDT = $request->TenHeDT;
        $result = $training->save();
        if($result){
            Alert::success("Thông báo!", "Thêm hệ đào tạo thành công.");
        }else {
            Alert::error("Thông báo!", "Thêm hệ đào tạo thất bại.");
        }
        return redirect(route("dashboard.trainings.index"));
    }

    
    public function edit(HeDaoTao $training)
    {
        return View::make("trainings.edit", compact("training"));
    }
    
    public function handleEdit(HeDaoTao $training, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "MaHeDT" => "required|min:3|unique:he_dao_taos,MaHeDT,".$training->id,
            "TenHeDT" => "required|min:3",
        ],[
            "required" => ":attribute không được để trống.",
            "min" => ":attribute không nhỏ hơn :min kí tự.",
            "unique" => ":attribute đã tồn tại.",
        ],[
            "MaHeDT" => "Mã hệ đào tạo",
            "TenHeDT" => "Tên hệ đào tạo",
        ]);

        if($validator->fails()) {
            return redirect(route("dashboard.trainings.add"))->withErrors($validator)->withInput();
        }
        $training->MaHeDT = $request->MaHeDT;
        $training->TenHeDT = $request->TenHeDT;
        $result = $training->save();
        if($result){
            Alert::success("Thông báo!", "Cập nhật hệ đào tạo thành công.");
        }else {
            Alert::error("Thông báo!", "Cập nhật hệ đào tạo thất bại.");
        }
        return redirect(route("dashboard.trainings.index"));
    }

    
    public function delete(HeDaoTao $training)
    {
        $lopCount = $training->lops()->count();
        if($lopCount == 0) {
            $result = HeDaoTao::destroy($training->id);
            if($result){
                Alert::success("Thông báo!", "Xoá '{$training->TenHeDT}' thành công.");
            }else {
                Alert::error("Thông báo!", "Xoá '{$training->TenHeDT}' thất bại.");
            }
        }else {
            Alert::error("Thông báo!", "Xoá '{$training->TenHeDT}' thất bại. Vui lòng kiểm tra lại dữ liệu.");
        }
        return redirect(route("dashboard.trainings.index"));
    }
}
