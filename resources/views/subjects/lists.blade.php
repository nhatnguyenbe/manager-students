@extends('layouts.dashboard')
@section('title', "Danh sách môn học")
@section('content')
<div class="content-page">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách môn học.</h4>
                </div>
                <div>
                    @can('subjects.add')
                    <a href="{{route("dashboard.subjects.add")}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm mới</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-12"> 
            <div class="table-responsive rounded mb-3">
                <table class=" table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>STT</th>
                            <th>Mã môn học</th>
                            <th>Tên môn học</th>
                            <th>Thuộc khoa</th>
                            <th>Số tín chỉ</th>
                            <th>Ngày tạo</th>
                            @can('subjects.edit')
                            <th width="6%">Sửa</th>
                            @endcan
                            @can('subjects.delete')
                            <th width="6%">Xoá</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @if ($subjects->count() > 0)
                            @foreach ($subjects as $key => $subject)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$subject->MaMH}}</td>
                                <td>{{$subject->TenMH}}</td>
                                <td>{{$subject->khoa->TenKhoa}}</td>
                                <td>{{$subject->SoTc}}</td>
                                <td>{{$subject->created_at->format('d-m-Y')}}</td>
                                @can('subjects.edit')
                                <td>
                                    <a class="action badge bg-success"
                                    href="{{ route("dashboard.subjects.edit", $subject)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                @endcan
                                @can('subjects.delete')
                                <td>
                                    <a class="action badge bg-warning" onclick="return confirm('Bạn xác nhận xoá?')"
                                    href="{{ route("dashboard.subjects.delete", $subject)}}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                @endcan
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