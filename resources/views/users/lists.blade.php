@extends('layouts.dashboard')
@section('title', "Danh sách tài khoản")
@section('content')
<div class="content-page">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Danh sách người dùng</h4>
                </div>
                <div>
                    @can('users.add')
                    <a href="{{route("dashboard.users.add")}}" class="btn btn-primary add-list"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Thêm người dùng</a>
                    @endcan
                    @can('users.delete_all')
                    <a href="" class="btn btn-warning delete-user-list d-none">Xoá <span></span> bản ghi</a>
                    @endcan
                </div>
            </div>
        </div>
        {{-- data-table --}}
        <div class="col-lg-12"> 
            @if (session("msg"))
                <x-alerts type="{{session('type')}}" message="{{session('msg')}}" />
            @endif
            <div class="table-responsive rounded mb-3">
                <form id="form-users-lists" action="{{ route("dashboard.users.delete.all")}}" method="post">
                    <table class=" table mb-0">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>
                                    <div class="checkbox d-inline-block">
                                        <input type="checkbox" class="checkbox-input" id="checkbox-all">
                                        <label for="checkbox-all" class="mb-0"></label>
                                    </div>
                                </th>
                                <th>Tài khoản</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Trạng thái</th>
                                @can('users.edit')
                                    <th width="6%">Sửa</th>
                                @endcan
                                @can('users.delete')
                                <th width="6%">Xoá</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @if ($users->count() > 0)
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>
                                        <div class="checkbox d-inline-block">
                                            <input type="checkbox" name="checkbox[]" value="{{ $user->id}}" class="checkbox-input checkbox-all">
                                        </div>
                                    </td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td class="text-center">{!! ($user->status) == 1 ? '<i class="far fa-check-circle text-primary"></i>': '<i class="far fa-check-circle text-red"></i>' !!}</td>
                                    @can('users.edit')
                                    <td>
                                        <a class="action badge bg-success"
                                        href="{{ route("dashboard.users.edit", $user)}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    @endcan
                                    @can('users.delete')
                                    <td>
                                        <a class="action badge bg-warning" onclick="return confirm('Bạn xác nhận xoá?')"
                                        href="{{ route("dashboard.users.delete", $user)}}">
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
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        const checkboxAll = document.querySelector("#checkbox-all");
        const checkboxList = document.querySelectorAll(".checkbox-all");
        const btnDelete = document.querySelector('.delete-user-list');
        const countList = document.querySelector('.delete-user-list > span');
        checkboxAll.addEventListener("change", function(e) {
            let checkedAll = checkboxAll.checked;
            checkboxList.forEach(element => {
                element.checked = checkedAll;
            });
            displayButtonDelete();
        })
        checkboxList.forEach((element) => {
            element.addEventListener("change", function() {
                let index =  document.querySelectorAll(".checkbox-all:checked").length;
                let checkList = checkboxList.length === index;
                checkboxAll.checked = checkList;
                displayButtonDelete();
            })
        });

        function displayButtonDelete(){
            let checkCount = document.querySelectorAll('input[name="checkbox[]"]:checked').length;
            if(checkCount > 0) {
                if(btnDelete != null) {
                    btnDelete.classList.remove("d-none");
                    countList.innerText = checkCount;
                }
            }else {
                if(btnDelete != null) {
                    btnDelete.classList.add("d-none");
                }
            }
        }

        if(btnDelete != null){
            btnDelete.addEventListener("click", function(e) {
                e.preventDefault();
                document.querySelector("#form-users-lists").submit();
            })
        }
        
    </script>
@endpush