@extends('layouts.dashboard')
@section('title', "Thêm môn học")
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm môn học</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("dashboard.subjects.add")}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mã môn học *</label>
                                        <input type="text" name="MaMH" value="{{ old("MaMH") }}" class="form-control @error('MaMH')
                                            is-invalid
                                        @enderror" placeholder="Mã môn học..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('MaMH')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên môn học *</label>
                                        <input type="text" name="TenMH" value="{{ old("TenMH") }}" class="form-control @error('TenMH')
                                            is-invalid
                                        @enderror" placeholder="Tên môn học..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('TenMH')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số tín chỉ *</label>
                                        <input type="text" name="SoTc" value="{{ old("SoTc") }}" class="form-control @error('SoTc')
                                            is-invalid
                                        @enderror" placeholder="Số tín chỉ..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('SoTc')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số tiết *</label>
                                        <input type="text" name="SoTiet" value="{{ old("SoTiet") }}" class="form-control @error('SoTiet')
                                            is-invalid
                                        @enderror" placeholder="Số tiết..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('SoTiet')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Khoa</label>
                                        <select name="MaKhoa_ID" class="form-control @error('MaKhoa_ID') is-invalid @enderror">
                                           <option selected value="0">Chọn khoa</option>
                                           @if(!empty($departments))
                                            @if ($departments->count() > 0)
                                                @foreach ($departments as $department)
                                                    <option {{ (old("MaKhoa_ID") == $department->id ) ? 'selected': false}} value="{{$department->id}}">{{$department->TenKhoa}}</option>
                                                @endforeach
                                            @endif
                                           @endif
                                        </select>
                                        @error('MaKhoa_ID')
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