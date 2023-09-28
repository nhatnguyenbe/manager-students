@extends('layouts.dashboard')
@section('title', "Thêm hệ đào tạo.")
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm hệ đào tạo.</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("dashboard.trainings.edit", $training)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mã hệ đào tạo *</label>
                                        <input type="text" name="MaHeDT" value="{{ old("MaHeDT") ?? $training->MaHeDT }}" class="form-control @error('MaHeDT')
                                            is-invalid
                                        @enderror" placeholder="Mã hệ đào tạo..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('MaHeDT')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên hệ đào tạo *</label>
                                        <input type="text" name="TenHeDT" value="{{ old("TenHeDT") ?? $training->TenHeDT}}" class="form-control @error('TenHeDT')
                                            is-invalid
                                        @enderror" placeholder="Tên hệ đào tạo..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('TenHeDT')
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