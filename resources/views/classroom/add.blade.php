@extends('layouts.dashboard')
@section('title', "Thêm lớp")
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm lớp</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("dashboard.classroom.add")}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mã lớp *</label>
                                        <input type="text" name="MaLop" value="{{ old("MaLop") }}" class="form-control @error('MaLop')
                                            is-invalid
                                        @enderror" placeholder="Mã Lớp..."  >
                                        @error('MaLop')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên Lớp *</label>
                                        <input type="text" name="TenLop" value="{{ old("TenLop") }}" class="form-control @error('TenLop')
                                            is-invalid
                                        @enderror" placeholder="Tên lớp..."  >
                                        @error('TenLop')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Khoa *</label>
                                        <select name="MaKhoa_ID" class="form-control @error('MaKhoa_ID') is-invalid @enderror">
                                            <option value="0">Chọn khoa</option>
                                            @if (!empty($khoas))
                                                @foreach ($khoas as $khoa)
                                                    <option {{ (old("MaKhoa_ID") == $khoa->id) ?"selected": false }} value="{{ $khoa->id}}"> {{ $khoa->TenKhoa }}</option>  
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('MaKhoa_ID')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hệ đào tạo *</label>
                                        <select name="MaHeDT_ID" class="form-control @error('MaHeDT_ID') is-invalid @enderror">
                                            <option value="0">Chọn hệ đào tạo</option>
                                            @if (!empty($hedaotaos))
                                                @foreach ($hedaotaos as $hedaotao)
                                                    <option {{ (old("MaHeDT_ID") == $hedaotao->id) ?"selected": false }} value="{{ $hedaotao->id}}"> {{ $hedaotao->TenHeDT }}</option>  
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('MaHeDT_ID')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Khoá học*</label>
                                        <select name="MaKhoaHoc_ID" class="form-control @error('MaKhoaHoc_ID') is-invalid @enderror">
                                            <option value="0">Chọn khoá</option>
                                            @if (!empty($thuockhoas))
                                                @foreach ($thuockhoas as $thuockhoa)
                                                    <option {{ (old("MaKhoaHoc_ID") == $thuockhoa->id) ?"selected": false }} value="{{ $thuockhoa->id}}"> {{ $thuockhoa->TenKhoaHoc }}</option>  
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('MaKhoaHoc_ID')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
@endsection