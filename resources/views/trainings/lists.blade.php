@extends('layouts.dashboard')
@section('title', "Danh sách hệ đào tạo")
@section('content')
<div class="content-page">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách hệ đào tạo.</h4>
                </div>
                <div>
                    @can('trainings.add')
                    <a href="{{route("dashboard.trainings.add")}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm mới</a>
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
                            <th>Mã hệ đào tạo</th>
                            <th>Tên hệ đào tạo</th>
                            <th>Ngày tạo</th>
                            @can('trainings.edit')
                            <th width="6%">Sửa</th>
                            @endcan
                            @can('trainings.delete')
                            <th width="6%">Xoá</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @if ($trainings->count() > 0)
                            @foreach ($trainings as $key => $training)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$training->MaHeDT}}</td>
                                <td>{{$training->TenHeDT}}</td>
                                <td>{{$training->created_at->format('d-m-Y')}}</td>
                                @can('trainings.edit')
                                <td>
                                    <a class="action badge bg-success"
                                    href="{{ route("dashboard.trainings.edit", $training)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                @endcan
                                @can('trainings.delete')
                                <td>
                                    <a class="action badge bg-warning" onclick="return confirm('Bạn xác nhận xoá?')"
                                    href="{{ route("dashboard.trainings.delete", $training)}}">
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