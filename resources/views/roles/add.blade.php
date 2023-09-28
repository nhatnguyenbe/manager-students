@extends('layouts.dashboard')
@section('title', "Thêm vai trò người dùng")
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm vai trò người dùng.</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("dashboard.roles.add")}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên vai trò *</label>
                                        <input type="text" name="name" value="{{ old("name") }}" class="form-control @error('name')
                                            is-invalid
                                        @enderror" placeholder="Nhập tên vai trò..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('name')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <label for="">Phân quyền</label>
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th width="1%">#</th>
                                                    <th width="30%">Router</th>
                                                    <th>Quyền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($models->count()>0)
                                                    @foreach ($models as $key => $model)
                                                        @php
                                                            if($model->function !== null){
                                                                $functionArr = json_decode($model->function, true);
                                                            }else {
                                                                $functionArr = [];
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$model->description}}</td>
                                                            <td>
                                                                <div class="row">
                                                                @if (!empty($functionArr))
                                                                @foreach ($functionArr as $roleName => $roleValue)
                                                                        <div class="col-3">
                                                                            <div class="checkbox d-inline-block">
                                                                                    <input type="checkbox" name="role[{{$model->name}}][]" value="{{$roleName}}" class="checkbox-input" id="{{$model->name}}_{{$roleName}}">
                                                                                <label for="{{$model->name}}_{{$roleName}}">{{$roleValue}}</label>
                                                                            </div>
                                                                        </div>
                                                                @endforeach
                                                                @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Thêm vai trò</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
@endsection