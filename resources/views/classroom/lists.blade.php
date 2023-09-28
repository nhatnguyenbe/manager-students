@extends('layouts.dashboard')
@section('title', "Danh sách lớp")
@section('content')
<div class="content-page">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách lớp.</h4>
                </div>
                <div>
                    @can('classroom.add')
                    <a href="{{route("dashboard.classroom.add")}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm mới</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-12"> 
            <div class="table-responsive rounded mb-3">
                <table class=" table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>#</th>
                            <th>Mã lớp</th>
                            <th>Tên lớp</th>
                            <th>Khoa</th>
                            <th>Thuộc khoá</th>
                            <th>Hệ đào tạo</th>
                            <th>Ngày tạo</th>
                            @can('classroom.edit')
                            <th width="6%">Sửa</th>
                            @endcan
                            @can('classroom.delete')
                            <th width="6%">Xoá</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @if ($classroom->count() > 0)
                            @foreach ($classroom as $key => $class)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$class->MaLop}}</td>
                                <td>{{$class->TenLop}}</td>
                                <td>{{$class->khoa->TenKhoa}}</td>
                                <td>{{$class->thuockhoa->TenKhoaHoc}}</td>
                                <td>{{$class->hedaotao->TenHeDT}}</td>
                                <td>{{$class->created_at->format('d-m-Y')}}</td>
                                @can('classroom.edit')
                                <td>
                                    <a class="action badge bg-success"
                                    href="{{ route("dashboard.classroom.edit", $class)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                @endcan
                                @can('classroom.delete')
                                <td>
                                    <a class="action badge bg-warning" onclick="return confirm('Bạn xác nhận xoá?')"
                                    href="{{ route("dashboard.classroom.delete", $class)}}">
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