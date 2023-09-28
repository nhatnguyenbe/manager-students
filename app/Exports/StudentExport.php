<?php

namespace App\Exports;

use App\Models\SinhViens;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithProperties;
class StudentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function collection()
    {
        return SinhViens::
        join("lops", "sinh_viens.MaLop_ID", "=", "lops.id")
        ->join("khoas", "lops.MaKhoa_ID", "=", "khoas.id")
        ->selectRaw(
            "sinh_viens.* , khoas.TenKhoa"
        )->get();
    }
}
