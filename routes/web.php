<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnouncementController;
use App\Http\Controllers\AsignStudentToClassController;
use App\Http\Controllers\AsignSubjectToClassController;
use App\Http\Controllers\AssignTeacherToClassController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\FeeheadController;
use App\Http\Controllers\FeeStructureController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentTimetableController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherTimetableController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//student routes
Route::group(['prefix' => 'student'], function() {

    //guest routes
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/login', [UserController::class, 'login'])->name('student.login');
        Route::post('/authenticate', [UserController::class, 'authenticate'])->name('student.authenticate');
    });

    //authenticated routes
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/timeables', [UserController::class, 'timeables'])->name('student.timeables');
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('student.dashboard');
        Route::get('/logout', [UserController::class, 'logout'])->name('student.logout');
        Route::get('/change_password', [UserController::class, 'change_password'])->name('student.change_password');
        Route::post('/update_password', [UserController::class, 'update_password'])->name('student.update_password');
        Route::get('/my_subject', [UserController::class, 'my_subject'])->name('student.my_subject');



    });

});


//teacher routes
Route::group(['prefix' => 'teacher'], function() {

    //guest routes
    Route::group(['middleware' => 'teacher.guest'], function(){
        Route::get('/login', [TeacherController::class, 'login'])->name('teacher.login');
        Route::post('/authenticate', [TeacherController::class, 'authenticate'])->name('teacher.authenticate');
    });

    //authenticated routes
    Route::group(['middleware' => 'teacher.auth'], function(){

        Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
          Route::get('/my-class', [TeacherController::class, 'myclass'])->name('teacher.myclass');
        Route::get('/logout', [TeacherController::class, 'logout'])->name('teacher.logout');



    });

});


//Parent routes
Route::group(['prefix' => 'parent'], function() {

    //guest routes
    Route::group(['middleware' => 'parent.guest'], function(){
        Route::get('/login', [ParentController::class, 'login'])->name('parent.login');
        Route::post('/paret_authenticate', [ParentController::class, 'paret_authenticate'])->name('parent.paret_authenticate');
    });

    //authenticated routes
    Route::group(['middleware' => 'parent.auth'], function(){

        Route::get('/dashboard', [ParentController::class, 'dashboard'])->name('parent.dashboard');



    });

});


Route::group(['prefix' => 'admin'], function() {

    Route::group(['middleware' => 'admin.guest'], function() {
        Route::get('/login', [AdminController::class, 'index'])->name('admin.login');
        Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
        Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    });

    Route::group(['middleware' => 'admin.auth'], function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/form', [AdminController::class, 'form'])->name('admin.form');
        Route::get('/table', [AdminController::class, 'table'])->name('admin.table');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

        //admins
        Route::get('/admin/new_admin', [AdminController::class, 'new_admin'])->name('admin.new_admin');
        Route::post('/admin/new_store', [AdminController::class, 'new_store'])->name('admin.new_store');
        Route::get('/admin/new_read', [AdminController::class, 'new_read'])->name('admin.new_read');
        Route::get('/admin/new_edit/{id}', [AdminController::class, 'new_edit'])->name('admin.new_edit');
        Route::post('/admin/new_update/{id}', [AdminController::class, 'new_update'])->name('admin.new_update');
        Route::get('/admin/new_delete/{id}', [AdminController::class, 'new_delete'])->name('admin.new_delete');


        //academic year
        Route::get('/academic_year', [AcademicYearController::class, 'academic_year'])->name('admin.academic_year');
        Route::post('/academic_store', [AcademicYearController::class, 'academic_store'])->name('admin.academic_store');
        Route::get('/academic_read', [AcademicYearController::class, 'academic_read'])->name('admin.academic_read');
        Route::get('/academic_edit/{id}', [AcademicYearController::class, 'academic_edit'])->name('admin.academic_edit');
        Route::post('/academic_update/{id}', [AcademicYearController::class, 'academic_update'])->name('admin.academic_update');
        Route::get('/academic_delete/{id}', [AcademicYearController::class, 'academic_delete'])->name('admin.academic_delete');



        //academic year
        Route::get('/class/class_add', [ClassController::class, 'class_add'])->name('class.class_add');
        Route::post('/class/class_store', [ClassController::class, 'class_store'])->name('class.class_store');
        Route::get('/class/class_read', [ClassController::class, 'class_read'])->name('class.class_read');
        Route::get('/class/class_edit/{id}', [ClassController::class, 'class_edit'])->name('class.class_edit');
        Route::post('/class/class_update/{id}', [ClassController::class, 'class_update'])->name('class.class_update');
        Route::get('/class/class_delete/{id}', [ClassController::class, 'class_delete'])->name('class.class_delete');


        //fees head
        Route::get('/fee/fee_create', [FeeheadController::class, 'fee_create'])->name('fee.fee_create');
        Route::post('/fee/fee_store', [FeeheadController::class, 'fee_store'])->name('fee.fee_store');
        Route::get('/fee/fee_read', [FeeheadController::class, 'fee_read'])->name('fee.fee_read');
        Route::get('/fee/fee_edit/{id}', [FeeheadController::class, 'fee_edit'])->name('fee.fee_edit');
        Route::post('/fee/fee_update/{id}', [FeeheadController::class, 'fee_update'])->name('fee.fee_update');
        Route::get('/fee/fee_delete/{id}', [FeeheadController::class, 'fee_delete'])->name('fee.fee_delete');



        //fees structure
        Route::get('/fee_structure/fee_add', [FeeStructureController::class,
         'fee_add'])->name('fee_structure.fee_add');

        Route::post('/fee_structure/feestructure_store', [FeeStructureController::class,
         'feestructure_store'])->name('fee_structure.feestructure_store');

        Route::get('/fee_structure/fee_list', [FeeStructureController::class,
         'fee_list'])->name('fee_structure.fee_list');

        Route::get('/fee_structure/fee_edit/{id}', [FeeStructureController::class,
         'fee_edit'])->name('fee_structure.fee_edit');

        Route::post('/fee_structure/fee_update/{id}', [FeeStructureController::class,
         'fee_update'])->name('fee_structure.fee_update');

        Route::get('/fee_structure/feestructure_delete/{id}', [FeeStructureController::class,
         'feestructure_delete'])->name('fee_structure.feestructure_delete');



        //student managment
        Route::get('/student/student_create', [StudentController::class, 'student_create'])->name('student.student_create');
        Route::post('/student/student_store', [StudentController::class, 'student_store'])->name('student.student_store');
        Route::get('/student/student_read', [StudentController::class, 'student_read'])->name('student.student_read');
        Route::get('/student/student_edit/{id}', [StudentController::class, 'student_edit'])->name('student.student_edit');
        Route::post('/student/student_update/{id}', [StudentController::class, 'student_update'])->name('student.student_update');
        Route::get('/student/student_delete/{id}', [StudentController::class, 'student_delete'])->name('student.student_delete');


        //anouncement routes
        Route::get('/anouncement/anouncement_create', [AnouncementController::class, 'anouncement_create'])->name('anouncement.create');
        Route::post('/anouncement/anouncement_store', [AnouncementController::class, 'anouncement_store'])->name('anouncement.anouncement_store');
        Route::get('/anouncement/anouncement_read', [AnouncementController::class, 'anouncement_read'])->name('anouncement.anouncement_read');
        Route::get('/anouncement/anouncement_edit/{id}', [AnouncementController::class, 'anouncement_edit'])->name('anouncement.anouncement_edit');
        Route::post('/anouncement/anouncement_update/{id}', [AnouncementController::class, 'anouncement_update'])->name('anouncement.anouncement_update');
        Route::get('/anouncement/anouncement_delete/{id}', [AnouncementController::class, 'anouncement_delete'])->name('anouncement.anouncement_delete');


        //anouncement routes
        Route::get('/subject/subject_create', [SubjectController::class, 'subject_create'])->name('subject.create');
        Route::post('/subject/subject_store', [SubjectController::class, 'subject_store'])->name('subject.subject_store');
        Route::get('/subject/subject_read', [SubjectController::class, 'subject_read'])->name('subject.subject_read');
        Route::get('/subject/subject_edit/{id}', [SubjectController::class, 'subject_edit'])->name('subject.subject_edit');
        Route::post('/subject/subject_update/{id}', [SubjectController::class, 'subject_update'])->name('subject.subject_update');
        Route::get('/subject/subject_delete/{id}', [SubjectController::class, 'subject_delete'])->name('subject.subject_delete');

        //asign subject routes
        Route::get('/asign_subject/asign_create', [AsignSubjectToClassController::class, 'asign_create'])->name('asign_subject.asign_create');
        Route::post('/asign_subject/asign_store', [AsignSubjectToClassController::class, 'asign_store'])->name('asign_subject.asign_store');
        Route::get('/asign_subject/asign_read', [AsignSubjectToClassController::class, 'asign_read'])->name('asign_subject.asign_read');
        Route::get('/asign_subject/asign_edit/{id}', [AsignSubjectToClassController::class, 'asign_edit'])->name('asign_subject.asign_edit');
        Route::post('/asign_subject/asign_update/{id}', [AsignSubjectToClassController::class, 'asign_update'])->name('asign_subject.asign_update');
        Route::get('/asign_subject/asign_delete/{id}', [AsignSubjectToClassController::class, 'asign_delete'])->name('asign_subject.asign_delete');


        //asign teacher routes
        Route::get('/asign_teacher/teach_create', [AssignTeacherToClassController::class, 'teach_create'])->name('asign_teacher.teach_create');
        Route::post('/asign_teacher/teach_store', [AssignTeacherToClassController::class, 'teach_store'])->name('asign_teacher.teach_store');
        Route::get('/asign_teacher/teach_read', [AssignTeacherToClassController::class, 'teach_read'])->name('asign_teacher.teach_read');
        Route::get('/asign_teacher/teach_edit/{id}', [AssignTeacherToClassController::class, 'teach_edit'])->name('asign_teacher.teach_edit');
        Route::post('/asign_teacher/teach_update/{id}', [AssignTeacherToClassController::class, 'teach_update'])->name('asign_teacher.teach_update');
        Route::get('/asign_teacher/teach_delete/{id}', [AssignTeacherToClassController::class, 'teach_delete'])->name('asign_teacher.teach_delete');



        //asign student routes
        Route::get('/asign_student/stud_create', [AsignStudentToClassController::class, 'stud_create'])->name('asign_student.stud_create');
        Route::post('/asign_student/stud_store', [AsignStudentToClassController::class, 'stud_store'])->name('asign_student.stud_store');
        Route::get('/asign_student/stud_read', [AsignStudentToClassController::class, 'stud_read'])->name('asign_student.stud_read');
        Route::get('/asign_student/stud_edit/{id}', [AsignStudentToClassController::class, 'stud_edit'])->name('asign_student.stud_edit');
        Route::post('/asign_student/stud_update/{id}', [AsignStudentToClassController::class, 'stud_update'])->name('asign_student.stud_update');
        Route::get('/asign_student/stud_delete/{id}', [AsignStudentToClassController::class, 'stud_delete'])->name('asign_student.stud_delete');



        //teacher routes
        Route::get('/teacher/teacher_create', [TeacherController::class, 'teacher_create'])->name('teacher.teacher_create');
        Route::post('/teacher/teacher_store', [TeacherController::class, 'teacher_store'])->name('teacher.teacher_store');
        Route::get('/teacher/teacher_read', [TeacherController::class, 'teacher_read'])->name('teacher.teacher_read');
        Route::get('/teacher/teacher_edit/{id}', [TeacherController::class, 'teacher_edit'])->name('teacher.teacher_edit');
        Route::post('/teacher/teacher_update/{id}', [TeacherController::class, 'teacher_update'])->name('teacher.teacher_update');
        Route::get('/teacher/teacher_delete/{id}', [TeacherController::class, 'teacher_delete'])->name('teacher.teacher_delete');



        //Timetable routes
        Route::get('/timetable/timetable_create', [TimetableController::class, 'timetable_create'])->name('timetable.timetable_create');
        Route::post('/timetable/timetable_store', [TimetableController::class, 'timetable_store'])->name('timetable.timetable_store');
        Route::get('/timetable/timetable_read', [TimetableController::class, 'timetable_read'])->name('timetable.timetable_read');
        Route::get('/timetable/timetable_delete/{id}', [TimetableController::class, 'timetable_delete'])->name('timetable.timetable_delete');


        //Timetable routes
        Route::get('/teacher-timetable/create', [TeacherTimetableController::class, 'create'])->name('teacher-timetable.create');
        Route::post('/teacher-timetable/store', [TeacherTimetableController::class, 'store'])->name('teacher-timetable.store');
        Route::get('/teacher-timetable/read', [TeacherTimetableController::class, 'read'])->name('teacher-timetable.read');
        Route::get('/teacher-timetable/delete/{id}', [TeacherTimetableController::class, 'delete'])->name('teacher-timetable.delete');




        //parent routes
        Route::get('/parent/parent_create', [ParentController::class, 'parent_create'])->name('parent.parent_create');
        Route::post('/parent/parent_store', [ParentController::class, 'parent_store'])->name('parent.parent_store');
        Route::get('/parent/parent_read', [ParentController::class, 'parent_read'])->name('parent.parent_read');
        Route::get('/parent/parent_edit/{id}', [ParentController::class, 'parent_edit'])->name('parent.parent_edit');
        Route::post('/parent/parent_update/{id}', [ParentController::class, 'parent_update'])->name('parent.parent_update');
        Route::get('/parent/parent_delete/{id}', [ParentController::class, 'parent_delete'])->name('parent.parent_delete');







    });

});



