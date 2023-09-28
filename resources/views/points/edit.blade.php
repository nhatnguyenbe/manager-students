@extends('layouts.dashboard')
@section('title', "Cập nhật điểm")
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Cập nhật điểm</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("dashboard.points.edit", $point)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sinh viên</label>
                                        <input type="text" readonly name="TenSV" value="{{ old("TenSV") ?? $point->sinhvien->TenSV}}" class="form-control @error('TenSV') is-invalid @enderror"/>
                                        @error('TenSV')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                     </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Môn học</label>
                                        <input type="text" readonly name="TenMH" value="{{ old("TenMH") ?? $point->monhoc->TenMH}}" class="form-control @error('TenMH') is-invalid @enderror"/>
                                        @error('TenMH')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                     </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Năm học *</label>
                                        <input type="text" name="NamHoc" value="{{ old("NamHoc") ?? $point->NamHoc }}" class="form-control @error('NamHoc')
                                            is-invalid
                                        @enderror" placeholder="2018-2019" >
                                        <div class="help-block with-errors"></div>
                                        @error('NamHoc')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Học kì *</label>
                                        <select name="HocKi" id="subjects" class="form-control @error('HocKi') is-invalid @enderror">
                                            <option value="0">Chọn học kì</option>
                                            <option {{((old("HocKi") ?? $point->HocKi) == 1)? "selected": false}} value="1">Học kì 1</option>
                                            <option {{((old("HocKi") ?? $point->HocKi) == 2)? "selected": false}} value="2">Học kì 2</option>
                                        </select>
                                        @error('HocKi')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                     </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Điểm chuyên cần *</label>
                                        <input type="text" name="DiemCC" value="{{ old("DiemCC") ?? $point->DiemCC}}" class="form-control @error('DiemCC')
                                            is-invalid
                                        @enderror" placeholder="Điểm chuyên cần..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('DiemCC')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Điểm giữa kì *</label>
                                        <input type="text" name="DiemGK" value="{{ old("DiemGK") ?? $point->DiemGK }}" class="form-control @error('DiemGK')
                                            is-invalid
                                        @enderror" placeholder="Điểm giữa kì..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('DiemGK')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Điểm cuối kì *</label>
                                        <input type="text" name="DiemCK" value="{{ old("DiemCK") ?? $point->DiemCK }}" class="form-control @error('DiemCK')
                                            is-invalid
                                        @enderror" placeholder="Điểm cuối kì..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('DiemCK')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Lần thi</label>
                                        <label for="LanThi" class="d-block cursor-pointer">
                                            <input type="checkbox" {{ (old("LanThi") ?? $point->LanThi) == 2 ? "checked": false}} name="LanThi" value="2" class="checkbox-input checkbox-all" id="LanThi">
                                            Thi lần 2
                                        </label>
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