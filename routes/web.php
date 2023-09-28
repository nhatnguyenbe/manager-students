<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhoaController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UsersController;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
    'register' => false,
]);

Route::get('/', [LoginController::class, 'showLoginForm']);

Route::prefix("/dashboard")->middleware("auth")->name("dashboard.")->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    // Users
    Route::prefix("/users")->name("users.")->middleware("can:users.view")->group(function(){
        Route::get("/", [UsersController::class, 'index'])->name("index");
        Route::get("/add", [UsersController::class, 'add'])->name("add")->can("users.add");
        Route::post("/add", [UsersController::class, 'handleAdd'])->can("users.add");

        Route::get("/edit/{user}", [UsersController::class, 'edit'])->name("edit")->can("users.edit");
        Route::post("/edit/{user}", [UsersController::class, 'handleEdit'])->can("users.edit");

        Route::get("/delete/{user}", [UsersController::class, 'delete'])->name("delete")->can("users.delete");
        Route::post("/delete-all", [UsersController::class, 'deleteAll'])->name("delete.all")->can("users.delete_all");
        Route::get("/profile", [UsersController::class, 'profile'])->name('profile')->middleware("password.confirm");
    });

    // Roles
    Route::prefix("/roles")->name("roles.")->middleware("can:roles.view")->group(function() {
        Route::get("/", [RolesController::class, 'index'])->name('index')->can("roles.view");

        Route::get("/add", [RolesController::class, 'add'])->name('add')->can("roles.add");
        Route::post("/add", [RolesController::class, 'handleAdd'])->can("roles.add");

        Route::get("/edit/{role}", [RolesController::class, 'edit'])->name('edit')->can("roles.edit");
        Route::post("/edit/{role}", [RolesController::class, 'handleEdit'])->can("roles.edit");

        Route::get("/delete/{role}", [RolesController::class, 'delete'])->name("delete")->can("roles.delete");
    });

    // Models
    Route::prefix("/setting")->name("setting.")->middleware("can:settings.view")->group(function(){
        Route::prefix("/model")->name("model.")->middleware("can:model.view")->group(function() {
            Route::get("/", [ModelController::class, 'index'])->name('index')->can("model.view");
    
            Route::get("/add", [ModelController::class, 'add'])->name('add')->can("model.add");
            Route::post("/add", [ModelController::class, 'handleAdd'])->can("model.add");
            Route::get("/edit/{model}", [ModelController::class, 'edit'])->name('edit')->can("model.edit");
            Route::post("/edit/{model}", [ModelController::class, 'handleEdit'])->can("model.edit");
    
            Route::get("/delete/{model}", [ModelController::class, 'delete'])->name("delete")->can("model.delete");
        });
    });

    // Khoas

    Route::prefix("/department")->name("department.")->middleware("can:departments.view")->group(function(){
        Route::get("/", [DepartmentController::class, "index"])->name("index")->can("departments.view");
        Route::get("/add", [DepartmentController::class, "add"])->name("add")->can("departments.add");
        Route::post("/add", [DepartmentController::class, "handleAdd"])->can("departments.add");;

        Route::get("/edit/{khoa}", [DepartmentController::class, "edit"])->name("edit")->can("departments.edit");
        Route::post("/edit/{khoa}", [DepartmentController::class, "handleEdit"])->can("departments.edit");
        Route::get("/delete/{khoa}", [DepartmentController::class, "delete"])->name("delete")->can("departments.delete");
    });
    // Courses
    Route::prefix("/courses")->name("courses.")->middleware("can:courses.view")->group(function(){
        Route::get("/", [CourseController::class, "index"])->name("index")->can("courses.view");
        Route::get("/add", [CourseController::class, "add"])->name("add")->can("courses.add");
        Route::post("/add", [CourseController::class, "handleAdd"])->can("courses.add");

        Route::get("/edit/{course}", [CourseController::class, "edit"])->name("edit")->can("courses.edit");
        Route::post("/edit/{course}", [CourseController::class, "handleEdit"])->can("courses.edit");

        Route::get("/delete/{course}", [CourseController::class, "delete"])->name("delete")->can("courses.delete");
    });

    // Training system
    Route::prefix("/trainings")->name("trainings.")->middleware("can:trainings.view")->group(function(){
        Route::get("/", [TrainingController::class, "index"])->name("index")->can("trainings.view");
        Route::get("/add", [TrainingController::class, "add"])->name("add")->can("trainings.add");
        Route::post("/add", [TrainingController::class, "handleAdd"])->can("trainings.add");

        Route::get("/edit/{training}", [TrainingController::class, "edit"])->name("edit")->can("trainings.edit");
        Route::post("/edit/{training}", [TrainingController::class, "handleEdit"])->can("trainings.edit");

        Route::get("/delete/{training}", [TrainingController::class, "delete"])->name("delete")->can("trainings.delete");
    });

    // subjects

    Route::prefix("/subjects")->name("subjects.")->middleware("can:subjects.view")->group(function(){
        Route::get("/", [SubjectController::class, "index"])->name("index")->can("subjects.view");
        Route::get("/add", [SubjectController::class, "add"])->name("add")->can("subjects.add");
        Route::post("/add", [SubjectController::class, "handleAdd"])->can("subjects.add");

        Route::get("/edit/{subject}", [SubjectController::class, "edit"])->name("edit")->can("subjects.edit");
        Route::post("/edit/{subject}", [SubjectController::class, "handleEdit"])->can("subjects.edit");

        Route::get("/delete/{subject}", [SubjectController::class, "delete"])->name("delete")->can("subjects.delete");
    });

    // classroom
    Route::prefix("/classroom")->name("classroom.")->middleware("can:classroom.view")->group(function(){
        Route::get("/", [ClassroomController::class, "index"])->name("index")->can("classroom.view");
        Route::get("/add", [ClassroomController::class, "add"])->name("add")->can("classroom.add");
        Route::post("/add", [ClassroomController::class, "handleAdd"])->can("classroom.add");

        Route::get("/edit/{class}", [ClassroomController::class, "edit"])->name("edit")->can("classroom.edit");
        Route::post("/edit/{class}", [ClassroomController::class, "handleEdit"])->can("classroom.edit");

        Route::get("/delete/{class}", [ClassroomController::class, "delete"])->name("delete")->can("classroom.delete");
    });

    // students 

    Route::prefix("/students")->name("students.")->middleware("can:students.view")->group(function(){
        Route::get("/", [StudentsController::class, "index"])->name("index")->can("students.view");
        Route::get("/add", [StudentsController::class, "add"])->name("add")->can("students.add");
        Route::post("/add", [StudentsController::class, "handleAdd"])->can("students.add");

        Route::get("/edit/{student}", [StudentsController::class, "edit"])->name("edit")->can("students.edit");
        Route::post("/edit/{student}", [StudentsController::class, "handleEdit"])->can("students.edit");

        Route::get("/view", [StudentsController::class, "view"])->name("view")->can("students.view_detail");
        Route::get("/delete/{student}", [StudentsController::class, "delete"])->name("delete")->can("students.delete");
        Route::post("/search", [StudentsController::class, "search"])->name("search");
        Route::get('student/export/' ,[StudentsController::class ,"export"])->name("export");
    });

    //point

    Route::prefix("/points")->name("points.")->middleware("can:points.view")->group(function(){
        Route::get("/", [PointController::class, "index"])->name("index")->can("points.view");
        Route::get("/add", [PointController::class, "add"])->name("add")->can("points.add");
        Route::post("/add", [PointController::class, "handleAdd"])->can("points.add");

        Route::get("/edit/{point}", [PointController::class, "edit"])->name("edit")->can("points.edit");
        Route::post("/edit/{point}", [PointController::class, "handleEdit"])->can("points.edit");

        Route::get("/delete/{point}", [PointController::class, "delete"])->name("delete")->can("points.delete");

        Route::get("/view/{point}", [PointController::class, "view"])->name("view")->can("points.view_detail");
        Route::get("/detail", [PointController::class, "detail"])->name("detail")->can("points.check");
        Route::post("/get-department", [PointController::class, "getDepartment"])->name("get.department");
        Route::post("/fetch-student", [PointController::class, "fetchStudent"])->name("fetch.student");
        Route::POST("/get-detail", [PointController::class, "getDetail"])->name("get.detail");
    });
});