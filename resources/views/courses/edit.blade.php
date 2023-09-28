@extends('layouts.dashboard')
@section('title', "Cập nhật khoá")
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Cập nhật khoá</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("dashboard.courses.edit", $course)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mã khoá *</label>
                                        <input type="text" name="MaKhoaHoc" value="{{ old("MaKhoaHoc") ?? $course->MaKhoaHoc }}" class="form-control @error('MaKhoaHoc')
                                            is-invalid
                                        @enderror" placeholder="Mã khoá..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('MaKhoaHoc')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên khoá *</label>
                                        <input type="text" name="TenKhoaHoc" value="{{ old("TenKhoaHoc") ?? $course->TenKhoaHoc }}" class="form-control @error('TenKhoaHoc')
                                            is-invalid
                                        @enderror" placeholder="Tên khoá..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('TenKhoaHoc')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
@endsection