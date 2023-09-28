@extends('layouts.dashboard')
@section('title', "Danh sách vai trò người dùng")
@section('content')
<div class="content-page">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách vai trò người dùng.</h4>
                </div>
                <div>
                    @can('roles.add')
                    <a href="{{route("dashboard.roles.add")}}" class="btn btn-primary add-list"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>Thêm</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-12"> 
            @if (session("msg"))
                <x-alerts type="{{session('type')}}" message="{{session('msg')}}" />
            @endif
            <div class="table-responsive rounded mb-3">
               
                <table class=" table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>STT</th>
                            <th>Tên vai trò</th>
                            <th>Quyền</th>
                            <th>Ngày tạo</th>
                            @can('roles.edit')
                            <th width="6%">Sửa</th>
                            @endcan
                            @can('roles.delete')
                            <th width="6%">Xoá</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @if ($roles->count() > 0)
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$role->name}}</td>
                                @can('roles.edit')
                                <td><a href="{{ route("dashboard.roles.edit", $role)}}">Phân quyền</a></td>
                                @endcan
                                <td>{{$role->created_at->format("d-m-Y")}}</td>
                                @can('roles.edit')
                                <td>
                                    <a class="action badge bg-success"
                                    href="{{ route("dashboard.roles.edit", $role)}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                                @endcan
                                @can('roles.delete')
                                <td>
                                    <a class="action badge bg-warning" onclick="return confirm('Bạn xác nhận xoá?')"
                                    href="{{ route("dashboard.roles.delete", $role)}}">
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
                {{$roles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection