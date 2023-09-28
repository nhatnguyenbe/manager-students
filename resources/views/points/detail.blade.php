@extends('layouts.dashboard')
@section('title', "Chi tiết điểm")
@section('css')
    <style>
        .search_box-student > form{
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
@endsection
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-2">
                    <div class="row">
                        <div class="col-md-6 search_box-student">
                            <form action="#" method="POST">
                                @csrf
                                <input type="text" class="form-control" name="masv" placeholder="Nhập mã sinh viên để xem điểm">
                                <button class="btn btn-primary seacrh-result-button"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="result-point-student">

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
            $(".seacrh-result-button").on("click",  (e) => {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{route('dashboard.points.get.detail')}}",
                    data: $(".search_box-student > form").serialize(),
                    // dataType: "json",
                    success: function (res) {
                        $(".result-point-student").html(res);
                        console.log(res);
                        if(res.status == "false") {
                            $(".result-point-student").html(`<x-alert type="${res.type}" message="${res.message}"/>`);
                        }
                    }
                });
            })
        });
    </script>
@endpush