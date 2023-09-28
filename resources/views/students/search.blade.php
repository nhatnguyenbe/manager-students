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