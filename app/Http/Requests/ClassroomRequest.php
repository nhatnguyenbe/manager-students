<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
        $class = $this->route()->class;
        $rules = [
            "MaLop" => "required|min:6|unique:lops,MaLop",
            "TenLop" => "required|min:6",
            "MaKhoa_ID" => ["required","numeric", function($attribute, $value, $fail) {
                if($value == 0) {
                    $fail("Vui lòng chọn khoa.");
                }
            }],
            "MaHeDT_ID" => ["required","numeric", function($attribute, $value, $fail) {
                if($value == 0) {
                    $fail("Vui lòng chọn hệ đào tạo.");
                }
            }],
            "MaKhoaHoc_ID" => ["required","numeric", function($attribute, $value, $fail) {
                if($value == 0) {
                    $fail("Vui lòng chọn khoá.");
                }
            }],
        ];
        if($class) {
            $rules["MaLop"] = "required|min:6|unique:lops,MaLop,".$class->id;
        }
        return $rules;
    }

    public function attributes()
    {
        return [
            "MaLop" => "Mã lớp",
            "TenLop" => "Tên lớp",
            "MaKhoa_ID" => "Khoa",
            "MaHeDT_ID" => "Hệ đào tạo",
            "MaKhoaHoc_ID" => "Khoá"
        ];
    }

    public function messages()
    {
        return [
            "required" => ":attribute không được để trống.",
            "min" => ":attribute phải lớn hơn :min kí tự.",
            "unique" => ":attribute đã tồn tại.",
            "numeric" => ":attribute phải là số."
        ];
    }
}