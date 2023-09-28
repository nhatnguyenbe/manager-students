@extends('layouts.dashboard')
@section('title', "Thêm tài khoản tài khoản")
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm người dùng</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("dashboard.users.add")}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Họ tên *</label>
                                        <input type="text" name="name" value="{{ old("name") }}" class="form-control @error('name')
                                            is-invalid
                                        @enderror" placeholder="Nhập họ tên..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('name')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên tài khoản *</label>
                                        <input type="text" name="username" value="{{ old("username") }}" class="form-control @error('username')
                                        is-invalid
                                        @enderror" placeholder="Nhập tên tài khoản" >
                                        <div class="help-block with-errors"></div>
                                        @error('username')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="text" name="email" value="{{ old("email") }}"class="form-control @error('email')
                                        is-invalid
                                        @enderror" placeholder="Nhập email..." >
                                        <div class="help-block with-errors"></div>
                                        @error('email')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" class="form-control @error('password')
                                        is-invalid
                                        @enderror" placeholder="Nhập mật khẩu.." >
                                        <div class="help-block with-errors"></div>
                                        @error('password')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Vai trò</label>
                                        <select name="role_id" class="form-control">
                                            <option value="0">Chọn vai trò</option>
                                            @if ($roles->count() >0)
                                                @foreach ($roles as $role)
                                                    <option {{ (old("role_id") == $role->id) ? "selected" : false }} value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('role_id')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Trạng thái *</label>
                                        <select name="status" class="selectpicker form-control" data-style="py-0">
                                            <option value="0">Chọn trạng thái</option>
                                            <option {{ (old('status') == 1) ? 'selected' : false }} value="1">Hoạt động</option>
                                            <option {{ (old('status') == 2) ? 'selected' : false }} value="2">Không hoạt động</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Thêm người dùng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
@endsection