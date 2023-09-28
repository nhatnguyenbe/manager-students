@extends('layouts.dashboard')
@section('title', "Thêm sinh viên")
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm sinh viên</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("dashboard.students.add")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mã sinh viên *</label>
                                                <input type="text" name="MaSV" value="{{ old("MaSV") }}" class="form-control @error('MaSV')
                                                    is-invalid
                                                @enderror" placeholder="Mã sinh viên.."  >
                                                @error('MaSV')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="d-block">Ảnh sinh viên *</label>
                                                <div class="show-image"></div>
                                                <input type="file" hidden name="image" value="{{ old("image") }}" class="form-control image-file">
                                                <span class="text-danger d-block error-image"></span>
                                                <button type="button" class="btn btn-primary button-select-image">Chọn ảnh</button>
                                                @error('image')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Năm nhập học *</label>
                                                <input type="date" name="NamNH" value="{{ old("NamNH") }}" class="form-control @error('NamNH')
                                                    is-invalid
                                                @enderror" placeholder="Thời gian nhập học.."  >
                                                @error('NamNH')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>CMND/CCCD *</label>
                                                <input type="text" name="cccd" value="{{ old("cccd") }}" class="form-control @error('cccd')
                                                    is-invalid
                                                @enderror" placeholder="Số cccd/cmnd.."  >
                                                @error('cccd')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Số điện thoại *</label>
                                                <input type="text"  name="DienThoai" value="{{ old("DienThoai") }}" class="form-control @error('DienThoai')
                                                    is-invalid
                                                @enderror" placeholder="Số điện thoại.."  >
                                                @error('DienThoai')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input type="text" name="email" value="{{ old("email") }}" class="form-control @error('email')
                                                    is-invalid
                                                @enderror" placeholder="Email.."  >
                                                @error('email')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tên sinh viên *</label>
                                                <input type="text" name="TenSV" value="{{ old("TenSV") }}" class="form-control @error('TenSV')
                                                    is-invalid
                                                @enderror" placeholder="Tên sinh viên..."  >
                                                @error('TenSV')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ngày sinh *</label>
                                                <input type="date" name="NgaySinh" value="{{ old("NgaySinh") }}" class="form-control @error('NgaySinh')
                                                    is-invalid
                                                @enderror">
                                                @error('NgaySinh')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Giới tính *</label>
                                                <select name="GioiTinh" class="form-control @error('GioiTinh')
                                                is-invalid @enderror">
                                                    <option value="0">Chọn giới tính</option>
                                                    <option {{ old("GioiTinh") == 1 ? 'selected' : false }} value="1">Nam</option>
                                                    <option {{ old("GioiTinh") == 2 ? 'selected' : false }} value="2">Nữ</option>
                                                </select>
                                                @error('GioiTinh')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nơi sinh *</label>
                                                <input type="text" name="NoiSinh" value="{{ old("NoiSinh") }}" class="form-control @error('NoiSinh')
                                                    is-invalid
                                                @enderror" placeholder="Số nhà, Đường, Quận, Thành phố..."  >
                                                @error('NoiSinh')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Quê quán *</label>
                                                <input type="text" name="QueQuan" value="{{ old("QueQuan") }}" class="form-control @error('QueQuan')
                                                    is-invalid
                                                @enderror" placeholder="Số nhà, Đường, Quận, Thành phố..."  >
                                                @error('QueQuan')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Dân tộc *</label>
                                                <input type="text" name="DanToc" value="{{ old("DanToc") }}" class="form-control @error('DanToc')
                                                    is-invalid
                                                @enderror" placeholder="Kinh"  >
                                                @error('DanToc')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tôn giáo *</label>
                                                <input type="text" name="TonGiao" value="{{ old("TonGiao") }}" class="form-control @error('TonGiao')
                                                    is-invalid
                                                @enderror" placeholder="Không, Thiên chúa giáo"  >
                                                @error('TonGiao')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Lớp *</label>
                                                <select name="MaLop_ID" class="form-control @error('MaLop_ID') is-invalid @enderror">
                                                    <option value="0">Chọn lớp</option>
                                                    @if (!empty($classroom))
                                                        @foreach ($classroom as $class)
                                                            <option {{ (old("MaLop_ID") == $class->id) ?"selected": false }} value="{{ $class->id}}"> {{ $class->TenLop }}</option>  
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('MaLop_ID')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
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

@push('script')
    <script>
        const imageFile = document.querySelector(".image-file");
        const buttonSelect = document.querySelector(".button-select-image");
        const showImage = document.querySelector(".show-image");
        const errorImage = document.querySelector(".error-image");

        buttonSelect.addEventListener("click", ()=> {
            imageFile.click();
        })
        imageFile.addEventListener("change", () => {
            const fileObject = imageFile.files;
            if(fileObject) {
                const fileList = fileObject[0];
                const fileTypeArr = ["image/png", "image/jpeg"];
                if(fileTypeArr.includes(fileList.type)) {
                    errorImage.innerText = "";
                    const fileSize = (fileList.size / (1024 * 1024)).toFixed(2);
                    if(fileSize  < 2) {
                        const fileReader = new FileReader();
                        fileReader.readAsDataURL(fileList);
                        fileReader.onload  = (e) => {
                            const imgResult = document.querySelector(".image-detail");
                            if(imgResult) imgResult.parentNode.removeChild(imgResult);
                            let img = document.createElement("img");
                            img.src = e.target.result;
                            img.alt = "Images Student";
                            img.classList.add("image-detail");
                            showImage.append(img);
                        }    
                    }else {
                        errorImage.innerText = "Kích thước ảnh phải nhỏ hơn 2 mb";
                    }
                }else {
                    errorImage.innerText = "Ảnh không đúng định dạng."
                }
            }
        })
    </script>
@endpush