@extends('layouts.dashboard')
@section('title', "Chi tiết điểm")
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Chi tiết điểm môn - {{$point->monhoc->TenMH}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sinh viên</label>
                                        <input type="text" disabled value="{{$point->sinhvien->TenSV}}" class="form-control">
                                    </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Môn học</label>
                                    <input type="text" disabled value="{{$point->monhoc->TenMH}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Lớp</label>
                                    <input type="text" disabled value="{{$point->TenLop}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Năm học</label>
                                    <input type="text" disabled value="{{$point->NamHoc}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Học kì</label>
                                    <input type="text" disabled value="{{$point->HocKi}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Lần học</label>
                                        <input type="text" disabled value="{{$point->LanHoc}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Số lần thi</label>
                                        <input type="text" disabled value="{{$point->LanThi}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Điểm chuyên cần</label>
                                    <input type="text" disabled value="{{$point->DiemCC}}" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Điểm giữa kì</label>
                                    <input type="text" disabled value="{{$point->DiemGK}}" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Điểm cuối kì</label>
                                    <input type="text" disabled value="{{$point->DiemCK}}" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Điểm hệ số 10</label>
                                    <input type="text" disabled value="{{$point->DiemHS10}}" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Điểm hệ số 4</label>
                                    <input type="text" disabled value="{{$point->DiemHS4}}" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Điểm chữ</label>
                                    <input type="text" disabled value="{{$point->DiemAlphabet}}" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Đánh giá</label>
                                    <input type="text" disabled value="{{$point->DanhGia == 1 ? "Đạt" :"Học lại"}}" class="form-control" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
@endsection