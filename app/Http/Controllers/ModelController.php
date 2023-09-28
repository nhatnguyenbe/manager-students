<?php

namespace App\Http\Controllers;

use App\Models\ModelsModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ModelController extends Controller
{
    public function index()
    {
        $models = ModelsModel::paginate(8);
        return view("models.lists", compact("models"));
    }

    public function add()
    {
        return view("models.add");
    }

    public function handleAdd(Request $request)
    {
        $request->validate([
            "name" => "required|min:4|unique:models,name",
            "description" => "required|string",
            "function" => ["required", function($attribute, $value, $fail) {
                $arrayCheck = ["view", "add", "edit","delete", "permission","check", "view_detail","delete_all"];
                $functionArr = explode(",", $value);
                $checkValue = array_diff($functionArr, $arrayCheck);
                if(!empty($checkValue)){
                    foreach ($checkValue as  $value) {
                        if(in_array($value, $arrayCheck) == false){
                            $fail("Chỉ cho phép view,add,edit,delete,view_detail,permission,check,delete_all");
                        }
                    }
                }
            }],
        ], [
            "name.required" => "Tên model không được để trống.",
            "name.min" => "Tên model phải lớn hơn :min kí tự.",
            "name.unique" => "Tên model đã tồn tại.",
            "description.string" => "Mô tả phải là chuỗi.",
            "description.required" => "Mô tả không được để trống.",
            "function.required" => "Chức năng không được để trống.",
        ]);

        $model = new ModelsModel();
        $model->name = $request->name;
        $model->description = $request->description;
        $newArr = [];
        $functionArr = explode(",", $request->function);
        foreach ($functionArr as $value) {
            if($value == "view") {
                $newArr[$value] = "Xem";
            }elseif($value == "add") {
                $newArr[$value] = "Thêm";
            }elseif($value == "edit") {
                $newArr[$value] = "Sửa";
            }elseif($value == "delete") {
                $newArr[$value] = "Xoá";
            }elseif($value == "permission") {
                $newArr[$value] = "Phân quyền";
            }elseif($value == "check") {
                $newArr[$value] = "Xem điểm";
            }elseif($value == "delete_all") {
                $newArr[$value] = "Xoá toàn bộ";
            }elseif($value == "view_detail") {
                $newArr[$value] = "Xem chi tiết";
            }
        }
        $functionJson = json_encode($newArr);
        $model->function = $functionJson;
        $result = $model->save();
        if($result) {
            Alert::success("Thông báo!", "Thêm thành công");
        }else{
            Alert::error("Thông báo!", "Thêm thất bại");
        }

        return redirect()->route("dashboard.setting.model.index");
    }

    public function edit(ModelsModel $model)
    {
    
        if($model->function !== null){
            $functionArr = json_decode($model->function, true);
            $function = implode(",", array_keys($functionArr));
            $model->function =  $function;
        }
        return view("models.edit", compact("model"));
    }

    public function handleEdit(ModelsModel $model, Request $request)
    {
        $request->validate([
            "name" => "required|min:4|unique:models,name,".$model->id,
            "description" => "required|string",
            "function" => ["required", function($attribute, $value, $fail) {
                $arrayCheck = ["view", "add", "edit","delete", "permission","check", "view_detail", "delete_all"];
                $functionArr = explode(",", $value);
                $checkValue = array_diff($functionArr, $arrayCheck);
                if(!empty($checkValue)){
                    foreach ($checkValue as  $value) {
                        if(in_array($value, $arrayCheck) == false){
                            $fail("Chỉ cho phép view,add,edit,delete,view_detail,permission,check,delete_all");
                        }
                    }
                }
            }],
        ], [
            "name.required" => "Tên model không được để trống.",
            "name.min" => "Tên model phải lớn hơn :min kí tự.",
            "name.unique" => "Tên model đã tồn tại.",
            "description.required" => "Mô tả không được để trống.",
            "description.string" => "Mô tả phải là chuỗi.",
        ]);
        $model->name = $request->name;
        $model->description = $request->description;
        $newArr = [];
        $functionArr = explode(",", $request->function);
        foreach ($functionArr as $value) {
            if($value == "view") {
                $newArr[$value] = "Xem";
            }elseif($value == "add") {
                $newArr[$value] = "Thêm";
            }elseif($value == "edit") {
                $newArr[$value] = "Sửa";
            }elseif($value == "delete") {
                $newArr[$value] = "Xoá";
            }elseif($value == "permission") {
                $newArr[$value] = "Phân quyền";
            }elseif($value == "check") {
                $newArr[$value] = "Xem điểm";
            }elseif($value == "delete_all") {
                $newArr[$value] = "Xoá toàn bộ";
            }elseif($value == "view_detail") {
                $newArr[$value] = "Xem chi tiết";
            }
        }
        $functionJson = json_encode($newArr);
        $model->function = $functionJson;
        $result = $model->save();
        if($result) {
            Alert::success("Thông báo!", "Cập nhật thành công");
        }else{
            Alert::error("Thông báo!", "Cập nhật thất bại");
        }

        return redirect()->route("dashboard.setting.model.index");
    }

    public function delete(ModelsModel $model)
    {
        $result = ModelsModel::destroy($model->id);
        if($result) {
            Alert::success("Thông báo!", "Cập nhật thành công");
        }else{
            Alert::error("Thông báo!", "Cập nhật thất bại");
        }

        return redirect()->route("dashboard.setting.model.index");
    }
}
