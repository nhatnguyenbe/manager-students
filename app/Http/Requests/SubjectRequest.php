<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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

        $subject = $this->route()->subject;
        $rules = [
            "MaMH" => "required|min:4|unique:mon_hocs",
            "TenMH" => "required|min:4",
            "SoTc" => "required|numeric",
            "SoTiet" => "required|numeric",
            "MaKhoa_ID" => ["required","numeric", function($attribute, $value, $fail){
                if($value == 0) {
                    $fail("Khoa không được để trống.");
                }
            }],
        ];
        if($subject) {
            $rules["MaMH"] = "required|min:4|unique:mon_hocs,MaMH,".$subject->id;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            "required" => ":attribute không được để trống.",
            "min" => ":attribute phải lớn hơn :min kí tự.",
            "unique" => ":attribute đã tồn tại.",
            "numeric" => ":attribute phải là số.",
        ];   
    }

    public function attributes()
    {
        return [
            "MaMH" => "Mã môn học",
            "TenMH" => "Tên môn học",
            "SoTc" => "Số tín chỉ",
            "SoTiet" => "Số tín chỉ",
            "MaKhoa_ID" => "Khoa",
        ];
    }
}