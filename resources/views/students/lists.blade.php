@extends('layouts.dashboard')
@section('title', "Danh sách sinh viên")
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh sách sinh viên.</h4>
                    </div>
                    <div>
                        <a href="#" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5"/></svg>
                            Export Excel
                        </a>
                        <a href="#" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 8l-5-5-5 5M12 4.2v10.3"/></svg>
                            Import Excel
                        </a>
                        @can('students.add')
                        <a href="{{route("dashboard.students.add")}}" class="btn btn-primary add-list"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>Thêm mới</a>
                        @endcan
                    </div>
                </div>
                <div class="mb-2">
                    <span class="cursor-pointer mb-2 btn btn-primary show-form-search"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Tìm kiếm sinh viên</span>
                    <form action="{{route("dashboard.students.search")}}" id="search-form" class="display-none" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="_name" value="{{ request()->_name}}" class="form-control name-student" placeholder="Tên sinh viên...">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" name="_code" value="{{ request()->_code}}" class="form-control code-student" placeholder="Mã sinh viên...">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="date" name="_date" value="{{ request()->_date}}" class="form-control date-student">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="_class" class="form-control class-student">
                                        <option value="">Chọn lớp</option>
                                        @if (!empty($classroom))
                                            @foreach ($classroom as $class)
                                                <option {{
                                                    (request()->_class == $class->id) ? "selected" :false
                                                }} value="{{$class->id}}"> {{ $class->TenLop }}</option>  
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="_depart" class="form-control depart-student">
                                        <option value="">Chọn khoa</option>
                                        @if (!empty($departments))
                                            @foreach ($departments as $department)
                                                <option {{
                                                    (request()->_depart == $department->id) ? "selected" :false
                                                }} value="{{$department->id}}"> {{ $department->TenKhoa }}</option>  
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Chọn trạng thái</option>
                                        <option {{ (request()->status) == 1 ? 'selected' : false }} value="1">Đang học</option>
                                        <option {{ (request()->status) == 2 ? 'selected' : false }} value="2">Bỏ học</option>
                                        <option {{ (request()->status) == 3 ? 'selected' : false }} value="3">Tạm hoãn</option>
                                        <option {{ (request()->status) == 4 ? 'selected' : false }} value="4">Tốt nghiệp</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group search-button">
                                    <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12 table-student"> 
                <div class="table-responsive rounded mb-3">
                    <table class="table mb-0">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>#</th>
                                <th>Mã sinh viên</th>
                                <th>Tên sinh viên</th>
                                <th>Ngày sinh</th>
                                <th>Lớp</th>
                                <th>Khoa</th>
                                <th>Nhập học</th>
                                @can('students.view_detail')
                                <th width="5%">Xem</th>
                                @endcan
                                @can('students.edit')
                                <th width="5%">Sửa</th>
                                @endcan
                                @can('students.delete')
                                <th width="5%">Xoá</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @if ($students->count() > 0)
                                @foreach ($students as $key => $student)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$student->MaSV}}</td>
                                    <td>{{$student->TenSV}}</td>
                                    <td>{{date_format(date_create($student->NgaySinh), "d-m-Y")}}</td>
                                    <td>{{$student->lop->TenLop}}</td>
                                    <td>{{$student->TenKhoa}}</td>
                                    <td>{{date_format(date_create($student->NamNH),"d-m-Y")}}</td>
                                    @can('students.view_detail')
                                    <td>
                                        <a href="{{route("dashboard.students.view")}}" class="action badge bg-info cursor-pointer view-student" data-student="{{$student->id}}"
                                            data-toggle="modal" data-target=".bd-example-modal-xl">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    @endcan
                                    @can('students.edit')
                                    <td>
                                        <a class="action badge bg-success"
                                        href="{{ route("dashboard.students.edit", $student)}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    @endcan
                                    @can('students.delete')
                                    <td>
                                        <a class="action badge bg-warning" onclick="return confirm('Bạn xác nhận xoá?')"
                                        href="{{ route("dashboard.students.delete", $student)}}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    @endcan
                                </tr>          
                                @endforeach
                            @else 
                                <tr>
                                    <td colspan="9" class="text-secondary">Không có dữ liệu bản ghi.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{$students->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"   aria-hidden="true">
        <div class="modal-dialog modal-xl">
           <div class="modal-content">
              <div class="modal-header">
                 <h5 class="modal-title">Thông tin sinh viên</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
              </div>
              <div class="modal-body modal-body-student">
                 
              </div>
           </div>
        </div>
     </div>
</div>
@endsection

@push('script')
    <script>
        function createBodyStudent(student) { 
            const template = `<div class="row body-student">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <form">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Mã sinh viên *</label>
                                                            <input type="text" readonly value="${student.MaSV}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="d-block">Ảnh sinh viên *</label>
                                                            <div class="show-image">
                                                                <img src="/images/${student.image}" alt="images student" class="image-detail">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Năm nhập học *</label>
                                                            <input type="date" readonly value="${student.NamNH}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Năm kết thúc *</label>
                                                            <input type="date" readonly value="${ student.NamKT}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>CMND/CCCD *</label>
                                                            <input type="text" readonly value="${ student.cccd }" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Số điện thoại *</label>
                                                            <input type="text" readonly value="${student.DienThoai}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Email *</label>
                                                            <input type="text" readonly value="${student.email }" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Tên sinh viên *</label>
                                                            <input type="text" readonly value="${student.TenSV}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Ngày sinh *</label>
                                                            <input type="date" readonly value="${ student.NgaySinh}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Giới tính *</label>
                                                            <select readonly class="form-control">
                                                                <option disabled ${student.GioiTinh == 1 ? 'selected' : false} value="1">Nam</option>
                                                                <option disabled ${student.GioiTinh == 2 ? 'selected' : false} value="2">Nữ</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Nơi sinh *</label>
                                                            <input type="text" readonly value="${ student.NoiSinh }" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Quê quán *</label>
                                                            <input type="text" disabled value="${student.QueQuan}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Dân tộc *</label>
                                                            <input type="text" disabled value="${student.DanToc}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tôn giáo *</label>
                                                            <input type="text" disabled value="${ student.TonGiao}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Lớp *</label>
                                                            <input type="text" disabled value="${ student.TenLop}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Trạng thái *</label>
                                                            <select readonly name="status" class="form-control">
                                                                <option disabled ${student.status == 1 ? 'selected' : false } value="1">Đang học</option>
                                                                <option disabled ${student.status == 2 ? 'selected' : false } value="2">Bỏ học</option>
                                                                <option disabled ${student.status == 3 ? 'selected' : false } value="3">Tạm hoãn</option>
                                                                <option disabled ${student.status == 4 ? 'selected' : false } value="4">Tốt nghiệp</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>`;
            const bodyStudent =  document.querySelector(".modal-body-student");
            bodyStudent.insertAdjacentHTML("afterbegin", template);
        }
        $(document).ready(function() {
            // show form search
            $(".show-form-search").on("click", function (e) {
                $("#search-form").toggle("display-none");
            })
            const viewStudent = $(".view-student");
            viewStudent.on("click", function (e) { 
                e.preventDefault();
                let url = $(this).attr("href");
                let id = $(this).data("student");
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        id :id
                    },
                    dataType: "json",
                    success: function (response) {
                        let student = response;
                        const bodyStydent =  document.querySelector(".body-student");
                        if(bodyStydent) bodyStydent.parentNode.removeChild(bodyStydent);
                        createBodyStudent(student);
                    },
                    error: function(error) {

                    }
                });
            })

            // search student
            const buttonSearch = $(".search-button");
            const formSearch = $("#search-form");
            buttonSearch.on("click", (e) => {
                e.preventDefault();
                // console.log(formSearch.serialize());
                const url = formSearch.attr("action");
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formSearch.serialize(),
                    success: function(res) {
                        $(".table-student").html(res)
                        if(res.status == "false") {
                            $(".table-student").html(`<x-alert type="danger" message="${res.message}"/>`);
                        }
                    }, 
                    error: function(error) {
                        // console.log(error);
                    }   
                })
            })
        })
    </script>
@endpush