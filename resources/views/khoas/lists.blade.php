@extends('layouts.dashboard')
@section('title', "Danh sách khoa")
@section('content')
<div class="content-page">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách khoa.</h4>
                </div>
                <div>
                    <a href="{{route("dashboard.department.add")}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm mới</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12"> 
            <div class="table-responsive rounded mb-3">
                <table class=" table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>STT</th>
                            <th>Mã khoa</th>
                            <th>Tên khoa</th>
                            <th>Số điện thoại</th>
                            <th class="text-center">Năm thành lập</th>
                            <th>Ngày tạo</th>
                            <th width="6%">Sửa</th>
                            <th width="6%">Xoá</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @if ($khoas->count() > 0)
                            @foreach ($khoas as $key => $khoa)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$khoa->MaKhoa}}</td>
                                <td>{{$khoa->TenKhoa}}</td>
                                <td>{{$khoa->DienThoai}}</td>
                                <td class="text-center">{{date_format(date_create($khoa->ThanhLap), "Y"),}}</td>
                                <td>{{$khoa->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <a class="action badge bg-success"
                                    href="{{ route("dashboard.department.edit", $khoa)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="action badge bg-warning" onclick="return confirm('Bạn xác nhận xoá?')"
                                    href="{{ route("dashboard.department.delete", $khoa)}}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>          
                            @endforeach
                        @else 
                            <tr>
                                <td colspan="9" class="text-secondary">Không có dữ liệu bản ghi.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection