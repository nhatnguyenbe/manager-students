@extends('layouts.dashboard')
@section('title', "Thêm khoa")
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm khoa</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("dashboard.department.add")}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mã khoa *</label>
                                        <input type="text" name="MaKhoa" value="{{ old("MaKhoa") }}" class="form-control @error('MaKhoa')
                                            is-invalid
                                        @enderror" placeholder="Mã khoa..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('MaKhoa')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên khoa *</label>
                                        <input type="text" name="TenKhoa" value="{{ old("TenKhoa") }}" class="form-control @error('TenKhoa')
                                            is-invalid
                                        @enderror" placeholder="Tên khoa..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('TenKhoa')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="DienThoai" value="{{ old("DienThoai") }}" class="form-control @error('DienThoai')
                                            is-invalid
                                        @enderror" placeholder="Số điện thoại..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('DienThoai')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Năm thành lập</label>
                                        <input type="date" name="ThanhLap" value="{{ old("ThanhLap") }}" class="form-control @error('ThanhLap')
                                            is-invalid
                                        @enderror" >
                                        <div class="help-block with-errors"></div>
                                        @error('ThanhLap')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
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