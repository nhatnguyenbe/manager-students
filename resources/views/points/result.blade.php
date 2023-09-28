<div>
    <div class="d-flex justify-content-between">
        <div class="header-title mt-2">
            <h4 class="card-title">Chào mừng sinh viên: {{$student->TenSV}}</h4>
        </div>
    </div>
    <div class="table-responsive rounded mb-3">
        <table class="table table-bordered mb-0">
            <thead class="bg-white text-uppercase">
                <tr class="ligth ligth-data">
                    <th>#</th>
                    <th>Mã học phần</th>
                    <th>Tên học phần</th>
                    <th>Tín chỉ</th>
                    <th>Lần thi</th>
                    <th>CC</th>
                    <th>GK</th>
                    <th>CK</th>
                    <th>Điểm hệ 10</th>
                    <th>Điểm hệ 4</th>
                    <th>Điểm chữ</th>
                    <th>Đánh giá</th>
                </tr>
            </thead>
            <tbody class="ligth-body">
                @if ($points->count() > 0)
                    @foreach ($points as $key => $point)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$point->MaMH}}</td>
                            <td>{{$point->TenMH}}</td>
                            <td>{{$point->SoTc}}</td>
                            <td>{{$point->LanThi}}</td>
                            <td>{{$point->DiemCC}}</td>
                            <td>{{$point->DiemGK}}</td>
                            <td>{{$point->DiemCK}}</td>
                            <td>{{$point->DiemHS10}}</td>
                            <td>{{$point->DiemHS4}}</td>
                            <td>{{$point->DiemAlphabet}}</td>
                            <td>{{$point->DanhGia == 0 ? "Học lại": "Đạt"}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>