@extends('layouts.dashboard')
@section('title', "Danh sách khoá")
@section('content')
<div class="content-page">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách khoá.</h4>
                </div>
                <div>
                    @can('courses.add')
                    <a href="{{route("dashboard.courses.add")}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm mới</a>
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
                            <th>Mã khoá</th>
                            <th>Tên khoá</th>
                            <th>Ngày tạo</th>
                            @can('courses.edit')
                            <th width="6%">Sửa</th>
                            @endcan
                            @can('courses.delete')
                            <th width="6%">Xoá</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @if ($courses->count() > 0)
                            @foreach ($courses as $key => $course)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$course->MaKhoaHoc}}</td>
                                <td>{{$course->TenKhoaHoc}}</td>
                                <td>{{$course->created_at->format('d-m-Y')}}</td>
                                @can('courses.edit')
                                <td>
                                    <a class="action badge bg-success"
                                    href="{{ route("dashboard.courses.edit", $course)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                @endcan
                                @can('courses.delete')
                                <td>
                                    <a class="action badge bg-warning" onclick="return confirm('Bạn xác nhận xoá?')"
                                    href="{{ route("dashboard.courses.delete", $course)}}">
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