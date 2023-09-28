<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Groups;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserRoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class UsersController extends Controller
{
    public function index()
    {
        $this->authorize("viewAny", User::class);
        $users = User::where("id", "<>", Auth::user()->id)->where("id", "<>", "1")->paginate(4);
        return View::make("users.lists", compact('users'));
    }

    public function add()
    {
        $roles = Roles::all();
        return View::make("users.add", compact("roles"));
    }

    public function handleAdd(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->input("name");
        $user->username = $request->input("username");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->status = $request->input("status");
        $user->role_id = $request->role_id;
        $result = $user->save();
        if($result) {
            $msg = "Thêm người dùng thành công";
            $type = "primary";
        }else {
            $msg = "Thêm người dùng thất bại";
            $type = "danger";
        }

        return redirect(route("dashboard.users.index"))->with("msg", $msg)->with("type", $type);
    }


    public function edit(User $user)
    {
        $this->authorize("update", $user);
        $roles = Roles::all();
        return View::make("users.edit", compact("roles", "user"));
    }

    public function handleEdit(User $user, UserRequest $request)
    {
        $this->authorize("update", $user);
        $user->name = $request->input("name");
        $user->username = $request->input("username");
        $user->email = $request->input("email");
        if($request->input("password")){
            $user->password = Hash::make($request->input("password"));
        }
        if($request->hasFile("images")){
            if($request->file("images")->isValid()) {
                // $name = $request->images->getClientOriginalName();
                $extends = $request->images->extension();
                $newName = sha1(uniqid()).".{$extends}";
                $request->images->move(public_path("images"), $newName);
                $user->images = $newName;
            }
        }
        $user->role_id = $request->role_id;
        $user->status = $request->input("status");

        $result = $user->save();
        if($result) {
            $msg = "Cập nhật người dùng thành công";
            $type = "primary";
        }else {
            $msg = "Cập nhật người dùng thất bại";
            $type = "danger";
        }

        return redirect(route("dashboard.users.index"))->with("msg", $msg)->with("type", $type);       
    }

    public function delete(User $user)
    {
        $this->authorize("delete", $user);
        $result = User::destroy($user->id);
        if($result) {
            $msg = "Xoá người dùng thành công";
            $type = "primary";
        }else {
            $msg = "Xoá người dùng thất bại";
            $type = "danger";
        }
        return redirect(route("dashboard.users.index"))->with("msg", $msg)->with("type", $type);   
    }

    public function deleteAll(Request $request)
    {
        $idArr = $request->checkbox;
        $count = count($idArr);
        $result = User::destroy(collect($idArr));        
        if($result) {
            $msg = "Xoá {$count} người dùng thành công";
            $type = "primary";
        }else {
            $msg = "Xoá {$count} người dùng thất bại";
            $type = "danger";
        }
        return redirect(route("dashboard.users.index"))->with("msg", $msg)->with("type", $type); 
    }
    public function profile(Request $request)
    {
        $user = auth()->user();
        return $this->edit($user, $request);
    }
}
