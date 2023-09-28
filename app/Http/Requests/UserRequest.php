<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = ($this->route()->user);
        // dd($this->file("images"));
        $rules =  [
            "name"=> "required|min:6|string",
            "username"=> "required|min:8|unique:users,username",
            "email" => "required|email|unique:users,email",
            "password"=> [
                "required", 
                Password::min(8)->letters()->mixedCase()->numbers()->symbols()
            ], 
            "role_id" => ["required", function($attribute, $value, $fail) {
                if($value == 0) {
                    $fail("Vai trò bắt buộc chọn.");
                }
            }],
            "status" => ["required", function($attribute, $value, $fail) {
                if($value == 0) {
                    $fail("Trạng thái bắt buộc chọn.");
                }
            }],
        ];

        if($user) {
            $rules['username'] = "sometimes|required|min:8|unique:users,username,".$user->id;
            $rules['email'] = "required|email|unique:users,email,".$user->id;
            if($this->password){
                $rules['password'] =  [ Password::min(8)->letters()->mixedCase()->numbers()->symbols()];
            }else {
                unset($rules['password']);
            }
            if($this->file("images")) {
                $rules['images'] = "image|mimes:jpg,jpeg,png,svg,gif|mimetypes:image/jpeg,image/png,image/svg+xml,image/gif|max:2048";
            }
        }
        return $rules;
    }

    public function messages()
    {
        return [
            "required" => ":attribute không được để trống.",
            "min" => ":attribute phải lớn hơn :min kí tự.",
            "string" => ":attribute phải là chuỗi.",
            "unique" => ":attribute đã tồn tại.",
            "email" => ":attribute không đúng định dạng.",
            "image" => ":attribute không đúng định dạng.",
            "max" => ":attribute tối đa :max mb",
            "mimetypes" => ":attribute không hỗ trợ",
        ]; 
    }

    public function attributes()
    {
        return [
            "name" => "Họ tên",
            "username" => "Tên tài khoản",
            "email" => "Email",
            "password" => "Mật khẩu",
            "group_id" => "Vai trò",
            "status" => "Trạng thái",
            "images" => "Ảnh"
        ];
    }
}
