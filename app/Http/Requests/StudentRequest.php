<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        $student = $this->route()->student;
        $rules = [
            "MaSV" => "required|min:8|unique:sinh_viens,MaSV",
            "TenSV" => "required|min:8",
            "NgaySinh" => "required|date", 
            "GioiTinh" => ["required", "numeric", function($attribute, $value, $fail) {
                if($value == 0 ) {
                    $fail("Vui lòng chọn giới tính");
                }
            }],
            "NoiSinh" => "required",
            "QueQuan" => "required",
            "DanToc"=> "required",
            "TonGiao" => "required",
            "MaLop_ID" => ["required", "numeric", function($attribute, $value, $fail) {
                if($value == 0 ) {
                    $fail("Vui lòng chọn lớp");
                }
            }],
            "image" => "required|image",
            "NamNH" => "required|date",
            "cccd" => "required|numeric|min:12",
            "DienThoai" => "required|numeric|min:10",
            "email" => "required|email",
        ];

        if($student) {
            $rules["MaSV"] = "required|min:8|unique:sinh_viens,MaSV,".$student->id;
            $rules["status"] = "required|numeric";
            if($this->file("image")) {
                $rules['images'] = "image";
            }else {
                unset($rules["image"]);
            }
        }
        return $rules;
    }
    public function messages()
    {
        return [
            "required" => ":attribute không được để trống",
            "min" => ":attribute phải lớn hơn :min kí tự",
            "max" => ":attribute phải nhỏ hơn :max kí tự",
            "numeric" => ":attribute phải là số",
            "unique" => ":attribute đã tồn tại",
            "date" => ":attribute phải là ngày tháng năm",
            "email" => ":attribute phải là định dạng email",
            "image" => ":attribute phải là hình ảnh",
        ];
    }

    public function attributes()
    {
        return [
            "MaSV" => "Mã sinh viên", 
            "TenSV" => "Tên sinh viên", 
            "NgaySinh" => "Ngày sinh", 
            "GioiTinh" => "Giới tính", 
            "NoiSinh" => "Nơi sinh", 
            "QueQuan" => "Quê quán",
            "NamNH" => "Năm sinh", 
            "cccd" => "CCCD", 
            "DienThoai" => "Số điện thoại", 
            "email" => "Email", 
            "MaLop_ID" => "Lớp",
            "DanToc"=> "Dân tộc",
            "TonGiao" => "Tôn giáo",
            "image" => "Hình ảnh",
            "status" => "Trạng thái",
        ];
    }
}
