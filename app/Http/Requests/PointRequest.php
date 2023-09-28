<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointRequest extends FormRequest
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
        $point = $this->route()->point;
        $rules = [
            "MaKhoa_ID" => ["required","numeric", function($attribute, $value, $fail) {
                if($value==0) {
                    $fail("Vui lòng chọn khoa.");
                }
            }],
            "MaLop" => ["required","numeric", function($attribute, $value, $fail) {
                if($value==0) {
                    $fail("Vui lòng chọn lớp.");
                }
            }],
            "MaSV" => ["required","numeric", function($attribute, $value, $fail) {
                if($value==0) {
                    $fail("Vui lòng chọn sinh viên.");
                }
            }],
            "MaMH" => ["required","numeric", function($attribute, $value, $fail) {
                if($value==0) {
                    $fail("Vui lòng chọn môn học.");
                }
            }],
            "DiemCC" => "required|numeric",
            "DiemGK" => "required|numeric",
            "DiemCK" => "required|numeric",
            "NamHoc" => "required",
            "HocKi" => ["required","numeric", function($attribute, $value, $fail) {
                if($value==0) {
                    $fail("Vui lòng chọn học kì.");
                }
            }],
        ];
        if($point) {
            unset($rules["MaKhoa_ID"]);
            unset($rules["MaLop"]);
            unset($rules["MaSV"]);
            unset($rules["MaMH"]);
            if($this->LanThi){
                $rules["LanThi"] = "numeric";
            }
        }
        return $rules;
    }

    public function messages()
    {
        return [
            "required" => ":attribute không được để trống.",
            "numeric" => ":attribute không đúng định dạng.",
        ];
    }

    public function attributes()
    {
        return [
            "MaKhoa_ID" => "Khoa",
            "MaLop" => "Lớp",
            "MaSV" => "Sinh viên",
            "MaMH" => "Môn học",
            "NamHoc" => "Năm học",
            "HocKi" => "Học kì",
            "DiemCC" => "Điểm chuyên cần",
            "DiemGK" => "Điểm giữa kì",
            "DiemCK" => "Điểm cuối kì",
        ];
    }
}
