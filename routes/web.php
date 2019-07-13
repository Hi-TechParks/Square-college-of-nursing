<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('/about', 'AboutController@index')->name('about');

/*Route::get('/contact', function () {
    return view('contact');
});*/

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'HomeController@index')->name('home');
Route::get('/message/{id}', 'HomeController@message')->name('message');
Route::get('/testimonial/{id}', 'HomeController@testimonial')->name('testimonial');


Route::get('/calendar', 'CalendarController@index')->name('user.calendar');
Route::get('/calendar/{id}', 'CalendarController@show')->name('user.calendar.show');


Route::get('/notice', 'NoticeController@index')->name('notice.index');
Route::get('/notice/single/{id}', 'NoticeController@show')->name('notice.show');


Route::get('/event', 'EventController@index')->name('event.index');
Route::get('/event/single/{id}', 'EventController@show')->name('event.show');


Route::get('/admission', 'AdmissionController@create')->name('admission.create');
Route::post('/admission/store', 'AdmissionController@store')->name('admission.store');



// Admin Slider Route
Route::get('/admin/slide', 'AdminSliderController@index')->name('slide.index');
Route::get('/admin/slide/create', 'AdminSliderController@create')->name('slide.create');
Route::post('/admin/slide/store', 'AdminSliderController@store')->name('slide.store');
Route::get('/admin/slide/show/{id}', 'AdminSliderController@show')->name('slide.show');
Route::get('/admin/slide/edit/{id}', 'AdminSliderController@edit')->name('slide.edit');
Route::post('/admin/slide/update/{id}', 'AdminSliderController@update')->name('slide.update');
Route::get('/admin/slide/status/{id}', 'AdminSliderController@status')->name('slide.status');



// Admin Designation Route
Route::get('/admin/designation', 'AdminDesignationController@index')->name('designation.index');
Route::get('/admin/designation/create', 'AdminDesignationController@create')->name('designation.create');
Route::post('/admin/designation/store', 'AdminDesignationController@store')->name('designation.store');
Route::get('/admin/designation/edit/{id}', 'AdminDesignationController@edit')->name('designation.edit');
Route::post('/admin/designation/update/{id}', 'AdminDesignationController@update')->name('designation.update');
Route::get('/admin/designation/status/{id}', 'AdminDesignationController@status')->name('designation.status');



// Admin Member Route
Route::get('/admin/member', 'AdminMemberController@index')->name('member.index');
Route::get('/admin/member/create', 'AdminMemberController@create')->name('member.create');
Route::post('/admin/member/store', 'AdminMemberController@store')->name('member.store');
Route::get('/admin/member/show/{id}', 'AdminMemberController@show')->name('member.show');
Route::get('/admin/member/edit/{id}', 'AdminMemberController@edit')->name('member.edit');
Route::post('/admin/member/update/{id}', 'AdminMemberController@update')->name('member.update');
Route::get('/admin/member/status/{id}', 'AdminMemberController@status')->name('member.status');



// Admin Message Route
Route::get('/admin/message', 'AdminMessageController@index')->name('message.index');
Route::get('/admin/message/create', 'AdminMessageController@create')->name('message.create');
Route::post('/admin/message/store', 'AdminMessageController@store')->name('message.store');
Route::get('/admin/message/show/{id}', 'AdminMessageController@show')->name('message.show');
Route::get('/admin/message/edit/{id}', 'AdminMessageController@edit')->name('message.edit');
Route::post('/admin/message/update/{id}', 'AdminMessageController@update')->name('message.update');
Route::get('/admin/message/status/{id}', 'AdminMessageController@status')->name('message.status');



// Admin Program Category Route
Route::get('/admin/procate', 'AdminProgramCategoryController@index')->name('procate.index');
Route::get('/admin/procate/create', 'AdminProgramCategoryController@create')->name('procate.create');
Route::post('/admin/procate/store', 'AdminProgramCategoryController@store')->name('procate.store');
Route::get('/admin/procate/edit/{id}', 'AdminProgramCategoryController@edit')->name('procate.edit');
Route::post('/admin/procate/update/{id}', 'AdminProgramCategoryController@update')->name('procate.update');
Route::get('/admin/procate/status/{id}', 'AdminProgramCategoryController@status')->name('procate.status');



// Admin Program Route
Route::get('/admin/program', 'AdminProgramController@index')->name('program.index');
Route::get('/admin/program/create', 'AdminProgramController@create')->name('program.create');
Route::post('/admin/program/store', 'AdminProgramController@store')->name('program.store');
Route::get('/admin/program/show/{id}', 'AdminProgramController@show')->name('program.show');
Route::get('/admin/program/edit/{id}', 'AdminProgramController@edit')->name('program.edit');
Route::post('/admin/program/update/{id}', 'AdminProgramController@update')->name('program.update');
Route::get('/admin/program/status/{id}', 'AdminProgramController@status')->name('program.status');



// Admin Session Route
Route::get('/admin/session', 'AdminSessionController@index')->name('session.index');
Route::get('/admin/session/create', 'AdminSessionController@create')->name('session.create');
Route::post('/admin/session/store', 'AdminSessionController@store')->name('session.store');
Route::get('/admin/session/show/{id}', 'AdminSessionController@show')->name('session.show');
Route::get('/admin/session/edit/{id}', 'AdminSessionController@edit')->name('session.edit');
Route::post('/admin/session/update/{id}', 'AdminSessionController@update')->name('session.update');
Route::get('/admin/session/status/{id}', 'AdminSessionController@status')->name('session.status');



// Admin Course Route
Route::get('/admin/course', 'AdminCourseController@index')->name('course.index');
Route::get('/admin/course/create', 'AdminCourseController@create')->name('course.create');
Route::post('/admin/course/store', 'AdminCourseController@store')->name('course.store');
Route::get('/admin/course/show/{id}', 'AdminCourseController@show')->name('course.show');
Route::get('/admin/course/edit/{id}', 'AdminCourseController@edit')->name('course.edit');
Route::post('/admin/course/update/{id}', 'AdminCourseController@update')->name('course.update');
Route::get('/admin/course/status/{id}', 'AdminCourseController@status')->name('course.status');



// Admin Program Course Route
Route::get('/admin/procourse', 'AdminProgramCourseController@index')->name('procourse.index');
Route::get('/admin/procourse/create', 'AdminProgramCourseController@create')->name('procourse.create');
Route::post('/admin/procourse/store', 'AdminProgramCourseController@store')->name('procourse.store');
Route::get('/admin/procourse/show/{id}', 'AdminProgramCourseController@show')->name('procourse.show');
Route::get('/admin/procourse/edit/{id}', 'AdminProgramCourseController@edit')->name('procourse.edit');
Route::post('/admin/procourse/update/{id}', 'AdminProgramCourseController@update')->name('procourse.update');
Route::get('/admin/procourse/status/{id}', 'AdminProgramCourseController@status')->name('procourse.status');



// Admin Student Route
Route::get('/admin/student', 'AdminStudentController@index')->name('student.index');
Route::get('/admin/student/create', 'AdminStudentController@create')->name('student.create');
Route::post('/admin/student/store', 'AdminStudentController@store')->name('student.store');
Route::get('/admin/student/show/{id}', 'AdminStudentController@show')->name('student.show');
Route::get('/admin/student/edit/{id}', 'AdminStudentController@edit')->name('student.edit');
Route::post('/admin/student/update/{id}', 'AdminStudentController@update')->name('student.update');
Route::get('/admin/student/status/{id}', 'AdminStudentController@status')->name('student.status');



// Admin Result Route
Route::get('/admin/result', 'AdminResultController@index')->name('result.index');
Route::get('/admin/result/create', 'AdminResultController@create')->name('result.create');
Route::post('/admin/result/store', 'AdminResultController@store')->name('result.store');
Route::get('/admin/result/show/{id}', 'AdminResultController@show')->name('result.show');
Route::get('/admin/result/edit/{id}', 'AdminResultController@edit')->name('result.edit');
Route::post('/admin/result/update/{id}', 'AdminResultController@update')->name('result.update');
Route::get('/admin/result/status/{id}', 'AdminResultController@status')->name('result.status');



// Admin Country Route
Route::get('/admin/country', 'AdminCountryController@index')->name('country.index');
Route::get('/admin/country/create', 'AdminCountryController@create')->name('country.create');
Route::post('/admin/country/store', 'AdminCountryController@store')->name('country.store');
Route::get('/admin/country/show/{id}', 'AdminCountryController@show')->name('country.show');
Route::get('/admin/country/edit/{id}', 'AdminCountryController@edit')->name('country.edit');
Route::post('/admin/country/update/{id}', 'AdminCountryController@update')->name('country.update');
Route::get('/admin/country/status/{id}', 'AdminCountryController@status')->name('country.status');




// Admin Application Route
Route::get('/admin/application', 'AdminApplicationController@index')->name('application.index');
Route::get('/admin/application/create', 'AdminApplicationController@create')->name('application.create');
Route::post('/admin/application/store', 'AdminApplicationController@store')->name('application.store');
Route::get('/admin/application/show/{id}', 'AdminApplicationController@show')->name('application.show');
Route::get('/admin/application/edit/{id}', 'AdminApplicationController@edit')->name('application.edit');
Route::post('/admin/application/update/{id}', 'AdminApplicationController@update')->name('application.update');
Route::get('/admin/application/status/{id}', 'AdminApplicationController@status')->name('application.status');



// Admin Declaration Route
Route::get('/admin/declaration', 'AdminDeclarationController@index')->name('declaration.index');
Route::get('/admin/declaration/create', 'AdminDeclarationController@create')->name('declaration.create');
Route::post('/admin/declaration/store', 'AdminDeclarationController@store')->name('declaration.store');
Route::get('/admin/declaration/show/{id}', 'AdminDeclarationController@show')->name('declaration.show');
Route::get('/admin/declaration/edit/{id}', 'AdminDeclarationController@edit')->name('declaration.edit');
Route::post('/admin/declaration/update/{id}', 'AdminDeclarationController@update')->name('declaration.update');
Route::get('/admin/declaration/status/{id}', 'AdminDeclarationController@status')->name('declaration.status');



// Admin Notice Route
Route::get('/admin/notice', 'AdminNoticeController@index')->name('notice.index');
Route::get('/admin/notice/create', 'AdminNoticeController@create')->name('notice.create');
Route::post('/admin/notice/store', 'AdminNoticeController@store')->name('notice.store');
Route::get('/admin/notice/show/{id}', 'AdminNoticeController@show')->name('notice.show');
Route::get('/admin/notice/edit/{id}', 'AdminNoticeController@edit')->name('notice.edit');
Route::post('/admin/notice/update/{id}', 'AdminNoticeController@update')->name('notice.update');
Route::get('/admin/notice/status/{id}', 'AdminNoticeController@status')->name('notice.status');



// Admin Event Route
Route::get('/admin/event', 'AdminEventController@index')->name('event.index');
Route::get('/admin/event/create', 'AdminEventController@create')->name('event.create');
Route::post('/admin/event/store', 'AdminEventController@store')->name('event.store');
Route::get('/admin/event/show/{id}', 'AdminEventController@show')->name('event.show');
Route::get('/admin/event/edit/{id}', 'AdminEventController@edit')->name('event.edit');
Route::post('/admin/event/update/{id}', 'AdminEventController@update')->name('event.update');
Route::get('/admin/event/status/{id}', 'AdminEventController@status')->name('event.status');



// Admin Event Type Route
Route::get('/admin/event/type', 'AdminEventTypeController@index')->name('event.type.index');
Route::get('/admin/event/type/create', 'AdminEventTypeController@create')->name('event.type.create');
Route::post('/admin/event/type/store', 'AdminEventTypeController@store')->name('event.type.store');
Route::get('/admin/event/type/show/{id}', 'AdminEventTypeController@show')->name('event.type.show');
Route::get('/admin/event/type/edit/{id}', 'AdminEventTypeController@edit')->name('event.type.edit');
Route::post('/admin/event/type/update/{id}', 'AdminEventTypeController@update')->name('event.type.update');
Route::get('/admin/event/type/status/{id}', 'AdminEventTypeController@status')->name('event.type.status');



// Admin Calendar Route
Route::get('/admin/calendar', 'AdminCalendarController@index')->name('calendar.index');
Route::get('/admin/calendar/create', 'AdminCalendarController@create')->name('calendar.create');
Route::post('/admin/calendar/store', 'AdminCalendarController@store')->name('calendar.store');
Route::get('/admin/calendar/show/{id}', 'AdminCalendarController@show')->name('calendar.show');
Route::get('/admin/calendar/edit/{id}', 'AdminCalendarController@edit')->name('calendar.edit');
Route::post('/admin/calendar/update/{id}', 'AdminCalendarController@update')->name('calendar.update');
Route::get('/admin/calendar/status/{id}', 'AdminCalendarController@status')->name('calendar.status');



// Admin Gallery Route
Route::get('/admin/gallery', 'AdminGalleryController@index')->name('gallery.index');
Route::get('/admin/gallery/create', 'AdminGalleryController@create')->name('gallery.create');
Route::post('/admin/gallery/store', 'AdminGalleryController@store')->name('gallery.store');
Route::get('/admin/gallery/show/{id}', 'AdminGalleryController@show')->name('gallery.show');
Route::get('/admin/gallery/edit/{id}', 'AdminGalleryController@edit')->name('gallery.edit');
Route::post('/admin/gallery/update/{id}', 'AdminGalleryController@update')->name('gallery.update');
Route::get('/admin/gallery/status/{id}', 'AdminGalleryController@status')->name('gallery.status');



// Admin Slider Route
Route::get('/admin/testimonial', 'AdminTestimonialController@index')->name('testimonial.index');
Route::get('/admin/testimonial/create', 'AdminTestimonialController@create')->name('testimonial.create');
Route::post('/admin/testimonial/store', 'AdminTestimonialController@store')->name('testimonial.store');
Route::get('/admin/testimonial/show/{id}', 'AdminTestimonialController@show')->name('testimonial.show');
Route::get('/admin/testimonial/edit/{id}', 'AdminTestimonialController@edit')->name('testimonial.edit');
Route::post('/admin/testimonial/update/{id}', 'AdminTestimonialController@update')->name('testimonial.update');
Route::get('/admin/testimonial/status/{id}', 'AdminTestimonialController@status')->name('testimonial.status');



// Admin Contact Email Route
Route::get('/admin/email', 'AdminContactEmailController@index')->name('email.index');
Route::get('/admin/email/show/{id}', 'AdminContactEmailController@show')->name('email.show');
Route::get('/admin/email/status/{id}', 'AdminContactEmailController@status')->name('email.status');


// Admin Contact Address Route
Route::get('/admin/address/edit/', 'AdminContactEmailController@edit')->name('address.edit');
Route::post('/admin/address/update/{id}', 'AdminContactEmailController@update')->name('address.update');


// Contact Route
Route::get('/contact', 'ContactController@create')->name('email.create');
Route::post('/admin/email/store', 'ContactController@store')->name('email.store');


// Admin About Route
Route::get('/admin/about/edit/', 'AdminAboutUsController@edit')->name('about.edit');
Route::post('/admin/about/update/{id}', 'AdminAboutUsController@update')->name('about.update');
