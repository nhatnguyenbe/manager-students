@extends('layouts.dashboard')
@section('title', "Chức năng phân quyền")
@section('content')
<div class="content-page">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Chức năng phân quyền.</h4>
                </div>
                <div>
                    @can('model.add')
                    <a href="{{route("dashboard.setting.model.add")}}" class="btn btn-primary add-list"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>Thêm</a>
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
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Ngày tạo</th>
                            @can('model.edit')
                            <th width="6%">Sửa</th>
                            @endcan
                            @can('model.delete')
                            <th width="6%">Xoá</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @if ($models->count() > 0)
                            @foreach ($models as $key => $model)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$model->name}}</td>
                                <td>{{$model->description}}</td>
                                <td>{{$model->created_at->format("d-m-Y")}}</td>
                                @can('model.edit')
                                <td>
                                    <a class="action badge bg-success"
                                    href="{{ route("dashboard.setting.model.edit", $model)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                @endcan
                                @can('model.delete')
                                <td>
                                    <a class="action badge bg-warning" onclick="return confirm('Bạn xác nhận xoá?')"
                                    href="{{ route("dashboard.setting.model.delete", $model)}}">
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
            <div class="d-flex justify-content-end">
                {{$models->links() }}
            </div>
        </div>
    </div>
</div>
@endsection