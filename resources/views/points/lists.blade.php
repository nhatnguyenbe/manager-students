@extends('layouts.dashboard')
@section('title', "Danh sách điểm")
@section('content')
<div class="content-page">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách điểm.</h4>
                </div>
                <div>
                    @can('points.add')
                    <a href="{{route("dashboard.points.add")}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Tạo bảng điểm</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <span class="cursor-pointer mb-2 btn btn-primary show-form-search"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Tìm kiếm điểm</span>
            <form action="{{route("dashboard.points.index")}}" id="search-form" class="display-none" method="get">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="text" name="name" value="{{request()->name}}" class="form-control" placeholder="Tên sinh viên...">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="text" name="code" value="{{request()->code}}" class="form-control" placeholder="Mã sinh viên...">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="text" name="yeah" value="{{request()->yeah}}" class="form-control" placeholder="2018-2019">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="subject" class="form-control">
                                <option value="0">Chọn môn học</option>
                                @if ($subjects->count()>0) 
                                    @foreach ($subjects as $subject)
                                        <option {{request()->subject == $subject->id ? "selected" : false}} value="{{$subject->id}}">{{$subject->TenMH}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-12"> 
            <div class="table-responsive rounded mb-3">
                <table class=" table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>STT</th>
                            <th>Sinh viên</th>
                            <th>Học phần</th>
                            <th class="text-center">Lần thi</th>
                            <th>CC</th>
                            <th>GK</th>
                            <th>CK</th>
                            <th>Ngày tạo</th>
                            @can('points.view_detail')
                            <th width="6%">Xem</th>
                            @endcan
                            @can('points.edit')
                            <th width="6%">Sửa</th>
                            @endcan
                            @can('points.delete')
                            <th width="6%">Xoá</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @if ($points->count() > 0)
                            @foreach ($points as $key => $point)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$point->sinhvien->TenSV}}</td>
                                <td>{{$point->monhoc->TenMH}}</td>
                                <td class="text-center">{{$point->LanThi}}</td>
                                <td>{{$point->DiemCC}}</td>
                                <td>{{$point->DiemGK}}</td>
                                <td>{{$point->DiemCK}}</td>
                                <td>{{$point->created_at->format('d-m-Y')}}</td>
                                @can('points.view_detail')
                                <td>
                                    <a class="action badge bg-success"
                                    href="{{ route("dashboard.points.view", $point)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    </a>
                                </td>
                                @endcan
                                @can('points.edit')
                                <td>
                                    <a class="action badge bg-success"
                                    href="{{ route("dashboard.points.edit", $point)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                                    </a>
                                </td>
                                @endcan
                                @can('points.delete')
                                <td>
                                    <a class="action badge bg-warning" onclick="return confirm('Bạn xác nhận xoá?')"
                                    href="{{ route("dashboard.points.delete", $point)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
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
                {{ $points->withQueryString()->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            // show form search
            $(".show-form-search").on("click", function (e) {
                $("#search-form").toggle("display-none");
            })
        });
    </script>
@endpush