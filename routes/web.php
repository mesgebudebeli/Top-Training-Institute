<?php

use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\InstructorController as AdminInstructorController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/category/{slug}', [CourseController::class, 'category'])->name('courses.category');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/apply/{slug}', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/apply/{slug}', [ApplicationController::class, 'store'])->name('applications.store');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    Route::get('/student/profile', [App\Http\Controllers\Student\ProfileController::class, 'index'])->name('student.profile');
    Route::put('/student/profile', [App\Http\Controllers\Student\ProfileController::class, 'update'])->name('student.profile.update');
    Route::put('/student/password', [App\Http\Controllers\Student\ProfileController::class, 'changePassword'])->name('student.password.update');
    Route::get('/student/assignments', [App\Http\Controllers\Student\AssignmentController::class, 'index'])->name('student.assignments');
    Route::get('/student/exams', [App\Http\Controllers\Student\ExamController::class, 'index'])->name('student.exams');
    Route::get('/payment/{applicationId}', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
    Route::post('/payment/{applicationId}', [App\Http\Controllers\PaymentController::class, 'process'])->name('payment.process');
    Route::get('/payment/{applicationId}/later', [App\Http\Controllers\PaymentController::class, 'payLater'])->name('payment.later');
});



Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', AdminCategoryController::class)->except(['show']);
    Route::resource('courses', AdminCourseController::class)->except(['show']);
    Route::resource('instructors', AdminInstructorController::class)->except(['show']);
    Route::resource('applications', AdminApplicationController::class)->except(['create', 'store']);
    Route::resource('inquiries', AdminInquiryController::class)->except(['create', 'store']);
    Route::resource('gallery', AdminGalleryController::class)->except(['show']);
    Route::resource('students', App\Http\Controllers\Admin\StudentController::class)->only(['index', 'show']);
    Route::put('/students/{student}/payment', [App\Http\Controllers\Admin\StudentController::class, 'updatePayment'])->name('students.payment');
    Route::resource('assignments', App\Http\Controllers\Admin\AssignmentController::class)->except(['show']);
    Route::resource('exams', App\Http\Controllers\Admin\ExamController::class)->except(['show']);
    Route::resource('results', App\Http\Controllers\Admin\ResultController::class)->except(['show']);
    Route::resource('materials', App\Http\Controllers\Admin\MaterialController::class)->except(['show']);
});


