<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset("assets/images/favicon.ico")}}" />
    <link rel="stylesheet" href="{{ asset("assets/css/backend-plugin.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/css/backend.css_v=1.0.0.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/vendor/@fortawesome/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/vendor/remixicon/fonts/remixicon.css")}}">
    <style>
        .action.badge {
            padding: 0.9em 0.9em !important;
            line-height: 1.3;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .cursor-pointer {
            cursor: pointer;
        }
        .display-none {
            display: none;
        }
        .show-image > img {
            height: 120px;
            max-width: 120px;
            width: 100%;
            object-fit: cover;
            border-radius: 6px;
        }
        .show-image {
            margin-bottom: 10px;
            overflow: hidden;
        }
    </style>
    @yield('css')
</head>
<body class="  ">
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="wrapper">
        <div class="iq-sidebar  sidebar-default ">
            <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                <a href="{{ route("dashboard.index")}}" class="header-logo">
                    <img src="{{ asset("assets/images/logo.png")}}" class="img-fluid rounded-normal light-logo" alt="logo">
                    <h5 class="logo-title light-logo ml-3">Manager</h5>
                </a>
                <div class="iq-menu-bt-sidebar ml-0">
                    <i class="las la-bars wrapper-menu"></i>
                </div>
            </div>
            <div class="data-scrollbar" data-scroll="1">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li class="{{(request()->path() == "dashboard")? 'active': false}}">
                            <a href="{{ route("dashboard.index")}}" class="svg-icon">
                                <svg class="svg-icon" id="p-dash1" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                    </path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                                <span class="ml-4">Tổng quan</span>
                            </a>
                        </li>
                        @can('departments.view')
                        <li class="{{request()->routeIs("dashboard.department.*") ? 'active' : false}}">
                            <a href="#department" class="collapsed" data-toggle="collapse"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                                <span class="ml-4">Khoa</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="department" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{(request()->path() == "dashboard/department")? 'active': false}}">
                                    <a href="{{route("dashboard.department.index")}}">
                                        <i class="las la-minus"></i><span>Danh sách</span>
                                    </a>
                                </li>
                                @can('departments.add')
                                <li class="{{(request()->path() == "dashboard/department/add")? 'active': false}}">
                                    <a href="{{route("dashboard.department.add")}}">
                                        <i class="las la-minus"></i><span>Thêm khoa</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('courses.view')
                        <li class="{{request()->routeIs("dashboard.courses.*") ? 'active' : false}}">
                            <a href="#course" class="collapsed" data-toggle="collapse"
                                aria-expanded="false">
                                <svg class="svg-icon" id="p-dash9" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="9"></rect><rect x="14" y="7" width="3" height="5"></rect>
                                </svg>
                                <span class="ml-4">Khoá</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="course" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{(request()->path() == "dashboard/courses")? 'active': false}}">
                                    <a href="{{route("dashboard.courses.index")}}">
                                        <i class="las la-minus"></i><span>Danh sách</span>
                                    </a>
                                </li>
                                @can('courses.add')
                                <li class="{{(request()->path() == "dashboard/courses/add")? 'active': false}}">
                                    <a href="{{route("dashboard.courses.add")}}">
                                        <i class="las la-minus"></i><span>Thêm</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('trainings.view')
                        <li class="{{request()->routeIs("dashboard.trainings.*") ? 'active' : false}}">
                            <a href="#trainings" class="collapsed" data-toggle="collapse"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
                                <span class="ml-4">Hệ đào tạo</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="trainings" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{(request()->path() == "dashboard/trainings")? 'active': false}}">
                                    <a href="{{route("dashboard.trainings.index")}}">
                                        <i class="las la-minus"></i><span>Danh sách</span>
                                    </a>
                                </li>
                                @can('trainings,add')
                                <li class="{{(request()->path() == "dashboard/trainings/add")? 'active': false}}">
                                    <a href="{{route("dashboard.trainings.add")}}">
                                        <i class="las la-minus"></i><span>Thêm</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('subjects.view')
                        <li class="{{request()->routeIs("dashboard.subjects.*") ? 'active' : false}}">
                            <a href="#subject" class="collapsed" data-toggle="collapse"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <span class="ml-4">Môn học</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="subject" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{(request()->path() == "dashboard/subjects")? 'active': false}}">
                                    <a href="{{route("dashboard.subjects.index")}}">
                                        <i class="las la-minus"></i><span>Danh sách</span>
                                    </a>
                                </li>
                                @can('subjects.add')
                                <li class="{{(request()->path() == "dashboard/subjects/add")? 'active': false}}">
                                    <a href="{{route("dashboard.subjects.add")}}">
                                        <i class="las la-minus"></i><span>Thêm</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('classroom.view')
                        <li class="{{ request()->routeIs("dashboard.classroom.*") ? "active" : false}}">
                            <a href="#classroom" class="collapsed" data-toggle="collapse"
                                aria-expanded="false">
                                <svg class="svg-icon" id="p-dash3" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                </svg>
                                <span class="ml-4">Lớp</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="classroom" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{(request()->path() == "dashboard/classroom") ? "active" : false}}">
                                    <a href="{{route("dashboard.classroom.index")}}">
                                        <i class="las la-minus"></i><span>Danh sách</span>
                                    </a>
                                </li>
                                @can('classroom.add')
                                <li class="{{(request()->path() == "dashboard/classroom/add") ? "active" : false}}">
                                    <a href="{{route("dashboard.classroom.add")}}">
                                        <i class="las la-minus"></i><span>Thêm</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('students.view')
                        <li class="{{ request()->routeIs("dashboard.students.*") ? "active": false}}">
                            <a href="#students" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M7 15h0M2 9.5h20"/></svg>
                                <span class="ml-4">Sinh viên</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="students" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ (request()->path() == "dashboard/students") ? "active": false}}">
                                    <a href="{{route("dashboard.students.index")}}">
                                        <i class="las la-minus"></i><span>Danh sách sinh viên</span>
                                    </a>
                                </li>
                                @can('students.add')
                                <li class="{{(request()->path() == "dashboard/students/add") ? "active": false}}">
                                    <a href="{{route("dashboard.students.add")}} ">
                                        <i class="las la-minus"></i><span>Thêm sinh viên</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('points.view')
                        <li class="{{ request()->routeIs("dashboard.points.*") ? "active": false}}">
                            <a href="#points" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                <span class="ml-4">Quản lý điểm</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="points" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ (request()->path() == "dashboard/points") ? "active": false}}">
                                    <a href="{{route("dashboard.points.index")}}">
                                        <i class="las la-minus"></i><span>Danh sách điểm</span>
                                    </a>
                                </li>
                                @can('points.add')
                                <li class="{{(request()->path() == "dashboard/points/add") ? "active": false}}">
                                    <a href="{{route("dashboard.points.add")}} ">
                                        <i class="las la-minus"></i><span>Tạo bảng điểm</span>
                                    </a>
                                </li>
                                @endcan
                                @can('points.check')
                                <li class="{{(request()->path() == "dashboard/points/detail") ? "active": false}}">
                                    <a href="{{route("dashboard.points.detail")}} ">
                                        <i class="las la-minus"></i><span>Xem điểm</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        {{-- Người dùng  --}}
                        @can('users.view')
                        <li class="{{request()->routeIs("dashboard.users.*")?'active':false}}">
                            <a href="#people" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ml-4">Người dùng</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="people" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{(request()->path() == "dashboard/users")?'active':false}}">
                                    <a href="{{ route("dashboard.users.index")}}">
                                        <i class="las la-minus"></i><span>Danh sách</span>
                                    </a>
                                </li>
                                @can('users.add')
                                <li class="{{(request()->path() == "dashboard/users/add")?'active':false}}">
                                    <a href="{{ route("dashboard.users.add")}}">
                                        <i class="las la-minus"></i><span>Thêm người dùng</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        {{-- vai trò người dùng  --}}
                        @can('roles.view')
                        <li class="{{ request()->routeIs("dashboard.roles.*") ? 'active' : false}}">
                            <a href="{{route("dashboard.roles.index")}}" class="">
                                <svg class="svg-icon" id="p-dash8" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                <span class="ml-4">Vai trò</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                        </li>
                        @endcan
                        @can('settings.view')
                        <li class="{{request()->routeIs("dashboard.setting.*")?'active':false}}">
                            <a href="#setting" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                <span class="ml-4">Cài đặt</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="setting" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                @can('model.view')
                                <li class="{{(request()->path() == "dashboard/setting/model")?'active':false}}">
                                    <a href="{{ route("dashboard.setting.model.index")}}">
                                        <i class="las la-minus"></i><span>Routes</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                    </ul>
                </nav>
                <div class="p-3"></div>
            </div>
        </div>
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                        <i class="ri-menu-line wrapper-menu"></i>
                        <a href="{{ route("dashboard.index")}}" class="header-logo">
                            <img src="{{ asset("assets/images/logo.png")}}" class="img-fluid rounded-normal" alt="logo">
                            <h5 class="logo-title ml-3">Managers</h5>

                        </a>
                    </div>
                    {{-- tìm kiếm --}}
                    <div class="iq-search-bar device-search">
                        <form action="#" class="searchbox">
                            <a class="search-link" href="#">
                                <i class="fas fa-search"></i>
                            </a>
                            <input type="text" class="text search-input" placeholder="Tìm kiếm...">
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <!--<div class="change-mode">
                          <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                              <div class="custom-switch-inner">
                                  <p class="mb-0"> </p>
                                  <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                                  <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                      <span class="switch-icon-left"><i class="a-left ri-moon-clear-line"></i></span>
                                      <span class="switch-icon-right"><i class="a-right ri-sun-line"></i></span>
                                  </label>
                              </div>
                          </div>
                      </div>-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon search-content">
                                    <a href="index.html#" class="search-toggle rounded" id="dropdownSearch"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-search-line"></i>
                                    </a>
                                    <div class="iq-search-bar iq-sub-dropdown dropdown-menu"
                                        aria-labelledby="dropdownSearch">
                                        <form action="index.html#" class="searchbox p-2">
                                            <div class="form-group mb-0 position-relative">
                                                <input type="text" class="text search-input font-size-12"
                                                    placeholder="type here to search...">
                                                <a href="index.html#" class="search-link"><i
                                                        class="las la-search"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                {{-- <li class="nav-item nav-icon dropdown">
                                    <a href="index.html#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        <span class="bg-primary"></span>
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 ">
                                                <div class="cust-title p-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h5 class="mb-0">All Messages</h5>
                                                        <a class="badge badge-primary badge-card"
                                                            href="index.html#">3</a>
                                                    </div>
                                                </div>
                                                <div class="px-3 pt-0 pb-0 sub-card">
                                                    <a href="index.html#" class="iq-sub-card">
                                                        <div
                                                            class="media align-items-center cust-card py-3 border-bottom">
                                                            <div class="">
                                                                <img class="avatar-50 rounded-small"
                                                                    src="../assets/images/user/01.jpg" alt="01">
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between">
                                                                    <h6 class="mb-0">Emma Watson</h6>
                                                                    <small class="text-dark"><b>12 : 47 pm</b></small>
                                                                </div>
                                                                <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="index.html#" class="iq-sub-card">
                                                        <div
                                                            class="media align-items-center cust-card py-3 border-bottom">
                                                            <div class="">
                                                                <img class="avatar-50 rounded-small"
                                                                    src="../assets/images/user/02.jpg" alt="02">
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between">
                                                                    <h6 class="mb-0">Ashlynn Franci</h6>
                                                                    <small class="text-dark"><b>11 : 30 pm</b></small>
                                                                </div>
                                                                <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="index.html#" class="iq-sub-card">
                                                        <div class="media align-items-center cust-card py-3">
                                                            <div class="">
                                                                <img class="avatar-50 rounded-small"
                                                                    src="../assets/images/user/03.jpg" alt="03">
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between">
                                                                    <h6 class="mb-0">Kianna Carder</h6>
                                                                    <small class="text-dark"><b>11 : 21 pm</b></small>
                                                                </div>
                                                                <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <a class="right-ic btn btn-primary btn-block position-relative p-2"
                                                    href="index.html#" role="button">
                                                    View All
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item nav-icon dropdown">
                                    <a href="index.html#" class="search-toggle dropdown-toggle" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                        </svg>
                                        <span class="bg-primary "></span>
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 ">
                                                <div class="cust-title p-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h5 class="mb-0">Notifications</h5>
                                                        <a class="badge badge-primary badge-card"
                                                            href="index.html#">3</a>
                                                    </div>
                                                </div>
                                                <div class="px-3 pt-0 pb-0 sub-card">
                                                    <a href="index.html#" class="iq-sub-card">
                                                        <div
                                                            class="media align-items-center cust-card py-3 border-bottom">
                                                            <div class="">
                                                                <img class="avatar-50 rounded-small"
                                                                    src="../assets/images/user/01.jpg" alt="01">
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between">
                                                                    <h6 class="mb-0">Emma Watson</h6>
                                                                    <small class="text-dark"><b>12 : 47 pm</b></small>
                                                                </div>
                                                                <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="index.html#" class="iq-sub-card">
                                                        <div
                                                            class="media align-items-center cust-card py-3 border-bottom">
                                                            <div class="">
                                                                <img class="avatar-50 rounded-small"
                                                                    src="../assets/images/user/02.jpg" alt="02">
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between">
                                                                    <h6 class="mb-0">Ashlynn Franci</h6>
                                                                    <small class="text-dark"><b>11 : 30 pm</b></small>
                                                                </div>
                                                                <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="index.html#" class="iq-sub-card">
                                                        <div class="media align-items-center cust-card py-3">
                                                            <div class="">
                                                                <img class="avatar-50 rounded-small"
                                                                    src="../assets/images/user/03.jpg" alt="03">
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between">
                                                                    <h6 class="mb-0">Kianna Carder</h6>
                                                                    <small class="text-dark"><b>11 : 21 pm</b></small>
                                                                </div>
                                                                <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <a class="right-ic btn btn-primary btn-block position-relative p-2"
                                                    href="index.html#" role="button">
                                                    View All
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                                @php
                                    $image = asset('images/user-default.jpg');
                                    $template = "<img src='{$image}' class='img-fluid rounded' alt='user'>";
                                    $name = "Admin";
                                    if (session("user")) {
                                        $name = session('user')->name;
                                        $image = url('images/'.session('user')->images);
                                        $template = "<img src='{$image}' class='img-fluid rounded' alt='user'>";
                                    }
                                @endphp
                                <li class="nav-item nav-icon dropdown caption-content">
                                    <a href="{{route("dashboard.index")}}" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {!! $template !!}
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 text-center">
                                                <div class="p-4">
                                                    <p class="mb-0">{{$name}}</p>
                                                    <div class="d-flex align-items-center justify-content-center mt-3">
                                                        <a href="{{route("dashboard.users.profile")}}"
                                                            class="btn border mr-2">Thông tin tài khoản</a>
                                                        <a href="#" data-toggle="modal" data-target="#logout" class="btn border">Đăng xuất</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Bạn có muốn đăng xuất?</h4>
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">{{ __("Nếu bạn đăng xuất, bạn sẽ phải đăng nhập lại.")}}</label>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">{{__('Huỷ')}}</div>
                                        <a onclick="event.preventDefault(); document.querySelector('#logout-form').submit();" class="btn btn-outline-primary" data-dismiss="modal">{{__('Chấp nhận')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <div class="contents">
            @yield('content')
        </div>
    </div>
    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                                <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 text-right">
                            <span class="mr-1">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>©
                            </span> <a href="index.html#" class="">POS Dash</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset("assets/js/backend-bundle.min.js")}}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{asset("assets/js/table-treeview.js")}}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{asset("assets/js/customizer.js")}}"></script>

    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset("assets/js/chart-custom.js")}}"></script>

    <!-- app JavaScript -->
    <script src="{{asset("assets/js/app.js")}}"></script>
    @include('sweetalert::alert')
    @stack('script')
</body>
</html>