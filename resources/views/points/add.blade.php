@extends('layouts.dashboard')
@section('title', "Thêm bảng điểm")
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm bảng điểm</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("dashboard.points.add")}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Khoa</label>
                                        <select name="MaKhoa_ID" id="khoas" class="form-control @error('MaKhoa_ID') is-invalid @enderror">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Lớp</label>
                                        <select name="MaLop" id="lops" class="form-control @error('MaLop') is-invalid @enderror">
                                        </select>
                                        @error('MaLop')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                     </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sinh viên</label>
                                        <select name="MaSV" id="sinhviens" class="form-control @error('MaSV') is-invalid @enderror">
                                        </select>
                                        @error('MaSV')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                     </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Môn học</label>
                                        <select name="MaMH" id="subjects" class="form-control @error('MaMH') is-invalid @enderror">
                                        </select>
                                        @error('MaMH')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                     </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Năm học *</label>
                                        <input type="text" name="NamHoc" value="{{ old("NamHoc") }}" class="form-control @error('NamHoc')
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
                                            <option {{(old("HocKi") == 1)? "selected": false}} value="1">Học kì 1</option>
                                            <option {{(old("HocKi") == 2)? "selected": false}} value="2">Học kì 2</option>
                                        </select>
                                        @error('HocKi')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                     </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Điểm chuyên cần *</label>
                                        <input type="text" name="DiemCC" value="{{ old("DiemCC") }}" class="form-control @error('DiemCC')
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
                                        <input type="text" name="DiemGK" value="{{ old("DiemGK") }}" class="form-control @error('DiemGK')
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
                                        <input type="text" name="DiemCK" value="{{ old("DiemCK") }}" class="form-control @error('DiemCK')
                                            is-invalid
                                        @enderror" placeholder="Điểm cuối kì..."  >
                                        <div class="help-block with-errors"></div>
                                        @error('DiemCK')
                                            <span class="text-danger font-italic"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Tạo bảng điểm</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $("#khoas").on("change", function (e) {
                let MaKhoa = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{route('dashboard.points.get.department')}}",
                    data: {
                        MaKhoa: MaKhoa, _token: "{{ csrf_token()}}"
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $("#lops").html('<option value="0">Chọn lớp</option>');
                        $.each(response.classroom, function (index, value) { 
                            $("#lops").append(`<option value="${value.id}">${value.MaLop} - ${value.TenLop}</option>`);
                        });
                        $("#subjects").html('<option value="0">Chọn môn học</option>');
                        $.each(response.subjects, function (index, value) { 
                            $("#subjects").append(`<option value="${value.id}">${value.MaMH} - ${value.TenMH}</option>`)
                        });
                    }
                });
            });
            $("#lops").on("change", function (e) {
                let MaLop = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{route('dashboard.points.fetch.student')}}",
                    data: {
                        MaLop: MaLop, _token: "{{csrf_token()}}"
                    },
                    dataType: "json",
                    success: function (res) {
                        $("#sinhviens").html('<option value="0">Chọn sinh viên</option>')
                        $.each(res.student, function (index, value) { 
                            $("#sinhviens").append(`<option value="${value.id}">${value.MaSV} - ${value.TenSV}</option>`)
                        });
                    }
                })
            })
        });
    </script>
@endpush