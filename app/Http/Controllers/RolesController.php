<?php

namespace App\Http\Controllers;

use App\Models\ModelsModel;
use App\Models\Roles;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RolesController extends Controller
{
    public function index()
    {
        $roles =  Roles::paginate(12);
        $models = ModelsModel::all();
        $role = isRole($models, "roles", "view");
        // dd($role);
        return view("roles.lists", compact("roles"));
    }

    public function add()
    {
        $models = ModelsModel::all();
        return view("roles.add", compact("models"));
    }

    public function handleAdd(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|string|unique:roles,name",
        ], [
            "name.required" => "Vai trò không được để trống.",
            "name.min" => "Vai trò phải lớn hơn :min kí tự.",
            "name.string" => "Vai trò phải là chuỗi kí tự.",
            "name.unique" => "Vai trò đã tồn tại",
        ]);
        $role = new Roles();
        $role->name = $request->name;
        if($request->has("role") && $request->role){
            $roleJson = json_encode($request->role);
        }else {
            $roleJson = json_encode([]);
        }
        $role->permission = $roleJson;
        $result = $role->save();
        if($result) {
            Alert::success("Thông báo!", "Thêm vai trò thành công");
        }else {
            Alert::error("Thông báo!", "Thêm vai trò thất bại");
        }
        return redirect()->route("dashboard.roles.index");
    }

    public function edit(Roles $role)
    {
        $models = ModelsModel::all();
        if($role->permission){
            $roleArr = json_decode($role->permission, true);
        }else {
            $roleArr = [];
        }
        return view("roles.edit", compact("role", "models", "roleArr"));
    }

    public function handleEdit(Roles $role, Request $request)
    {
        $request->validate([
            "name" => "required|min:3|string|unique:roles,name,".$role->id,
        ], [
            "name.required" => "Vai trò không được để trống.",
            "name.min" => "Vai trò phải lớn hơn :min kí tự.",
            "name.string" => "Vai trò phải là chuỗi kí tự.",
            "name.unique" => "Vai trò đã tồn tại",
        ]);

        $role->name = $request->name;
        if($request->has("role") && $request->role){
            $roleJson = json_encode($request->role);
        }else {
            $roleJson = json_encode([]);
        }
        $role->permission = $roleJson;
        $result = $role->save();
        if($result) {
            Alert::success("Thông báo!", "Cập nhật thành công");
        }else {
            Alert::error("Thông báo!", "Cập nhật thất bại");
        }
        return redirect()->route("dashboard.roles.index");
    }
    public function delete(Roles $role)
    {
        $userCount = $role->user()->count();
        if($userCount == 0) {
            $result = Roles::destroy($role->id);
            if($result) {
                Alert::success("Thông báo!", "Xoá thành công");
            }else {
                Alert::error("Thông báo!", "Xoá thất bại");
            }
        }else {
            Alert::error("Thông báo!", "Không thể xoá vai trò này. Vui lòng kiểm tra dữ liệu");
        }
        return redirect()->route("dashboard.roles.index");
    }
}
