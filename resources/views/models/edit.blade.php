@extends('layouts.dashboard')
@section('title', "Cập nhật model phân quyền")
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Cập nhật model phân quyền.</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("dashboard.setting.model.edit", $model)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên model *</label>
                                        <input type="text" readonly name="name" value="{{ old("name") ?? $model->name }}" class="form-control @error('name')
                                            is-invalid
                                        @enderror" placeholder="Nhập tên model..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('name')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mô tả *</label>
                                        <input type="text" name="description" value="{{ old("description") ?? $model->description }}" class="form-control @error('description')
                                            is-invalid
                                        @enderror" placeholder="Mô tả..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('description')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Chức năng *</label>
                                        <input type="text" name="function" value="{{ old("function") ?? $model->function }}" class="form-control @error('function')
                                            is-invalid
                                        @enderror" placeholder="view,add,delete...">
                                        <div class="help-block with-errors"></div>
                                        @error('function')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div> 
                                </div>
                            </div>
                            <ul>
                                <li>view: Xem</li>
                                <li>add: Thêm</li>
                                <li>edit: Cập nhật</li>
                                <li>delete: Xoá</li>
                                <li>view_detail: Xem chi tiết</li>
                                <li>permission: Phân quyền</li>
                                <li>delete_all: Xoá toàn bộ</li>
                                <li>check: Xem điểm</li>
                            </ul>
                            <button type="submit" class="btn btn-primary mr-2">Cập nhật model</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
@endsection