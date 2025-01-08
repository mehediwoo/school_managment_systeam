<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\adminController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\schoolSubcription;
use App\Http\Controllers\Backend\settingController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\SessionController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\Backend\BranchSubsController;
use App\Http\Controllers\Backend\RegistrationController;

use App\Http\Controllers\Backend\StudentRgisterFundController;
use App\Http\Controllers\SMTPController;
use App\Http\Middleware\superAdmin;
use App\Http\Controllers\Backend\BkashPaymentController;
use App\Http\Controllers\Backend\ExamSetUpController;

use App\Http\Controllers\Backend\ExamHallController;
use App\Http\Controllers\frontend\InstituteController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\InstituteProfileController;
use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\ExamMarkDistributionController;
use App\Http\Controllers\Backend\ExamTypeController;
use App\Http\Controllers\Backend\ExamNameController;
use App\Http\Controllers\Backend\ExamCenterController;
use App\Http\Controllers\Backend\cardManagement;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\AttendanceController;
use App\Http\Controllers\Backend\GradeController;
use App\Http\Controllers\Backend\ExamSubjectController;
use App\Http\Controllers\Backend\CertificateController;
use App\Http\Controllers\Backend\ExamPublishController;
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

// Route::get('/', function () {
//   $branch=BranchController::where('status','Active')->get();
//   dd($branch);
//     return view('welcome',compact('branch'));
// });

Route::get('/',[InstituteController::class,'welcome']);

//middleware for institute route

Route::get('/bkash/payment', [App\Http\Controllers\BkashTokenizePaymentController::class,'index']);
Route::get('/bkash/create-payment', [App\Http\Controllers\BkashTokenizePaymentController::class,'createPayment'])->name('bkash-create-payment');
Route::get('/bkash/callback', [App\Http\Controllers\BkashTokenizePaymentController::class,'callBack'])->name('bkash-callBack');



// Routes for institute
Route::group(['middleware' => ['institute']], function () {

  Route::get('/institute/dashboard', [InstituteController::class, 'dashboard'])->name('institute.dashboard');

});



//for both midleware access route


Route::prefix('Student/')->group(function(){

  Route::get('all',[StudentController::class,'allStudent'])->name('all.student');
  Route::get('get/all',[StudentController::class,'getAllStudent'])->name('gate.all.student');
  Route::get('get/sessions',[StudentController::class,'get_sessions'])->name('get.sessions');
  Route::get('addmission/form',[StudentController::class,'addmissionForm'])->name('addmision.form');
  Route::post('insert',[StudentController::class,'insertStudent']);
  Route::get('edit/{id}',[StudentController::class,'editStudent'])->name('student.edit');
  Route::post('update/{id}',[StudentController::class,'updateStudent']);
  Route::get('delete/{id}',[StudentController::class,'deleteStudent'])->name('student.delete');
  Route::get('info/{id}',[StudentController::class,'studentInfo'])->name('student.info');
  //reggistration
  Route::get('addmission/registration/page',[StudentController::class,'Addmission_Registration'])->name('addmision.registration');
  Route::get('new/register',[StudentController::class,'newRegistration'])->name('student_registration');
  Route::get('get/new/register',[StudentController::class,'getNewRegStudent'])->name('gate.all.reg.student');
  Route::post('registration/insert',[StudentController::class,'newRegistrationInsert'])->name('insert.registration');
  Route::get('register/cancel/{id}',[StudentController::class,'CancelRegister'])->name('cancle.registration');

   //ajax get session
   Route::get('get/student/filtering',[StudentController::class,'student_filtaring'])->name('search.stu.filtaring');
   Route::get('get/session',[StudentController::class,'get_session']);
   Route::get('get/Search',[StudentController::class,'search_student']);
   Route::get('get/Searches',[StudentController::class,'search'])->name('searches');

      //print

  Route::get('Print/Student',[StudentController::class,'print_student']);
  Route::get('search', [StudentController::class, 'searchByInstituteId']);


})->middleware(['superAdmin', 'institute']);




Route::prefix('Registration/')->group(function(){

    //add Registration Fund
    Route::get('add/fund',[StudentRgisterFundController::class,'add_fund'])->name('add.fund');
    Route::get('student/all/fund/view',[StudentRgisterFundController::class,'allFund'])->name('all.fund.view');
    Route::post('Fund/Insert',[StudentRgisterFundController::class,'fundInsert']);
    Route::get('Fund/delete/{id}',[StudentRgisterFundController::class,'fund_delete'])->name('fund_delete');
    //get fund result
    Route::get('reg/fund',[StudentRgisterFundController::class,'getFund']);
    Route::get('get/reg/fund',[StudentRgisterFundController::class,'getFunds'])->name('get.st.reg');
    Route::get('get/session',[StudentRgisterFundController::class,'get_course_session'])->name('get_course_session');
    Route::get('get/session-course',[StudentRgisterFundController::class,'session'])->name('get_session_with_course');
    Route::get('fund/voucher/Pdf/{id}',[StudentRgisterFundController::class,'fundVoucherPdf']);
})->middleware(['superAdmin', 'institute']);

// institute Profile
Route::prefix('institute/')->group(function(){

    //add Registration Fund
    Route::get('profile',[InstituteProfileController::class,'index'])->name('institute.profile.index');
    Route::post('update-password',[InstituteProfileController::class,'profile_update'])->name('institute.profile.update');

})->middleware(['institute']);



Route::prefix('Notices/')->group(function(){

    Route::get('detail/{id}',[NoticeController::class,'noticeDetails'])->name('notice.details');
    Route::get('view-all',[NoticeController::class,'view_all_notice'])->name('view.all.notice');
    
})->middleware(['superAdmin', 'institute']);


Route::prefix('reports/')->group(function(){

    // Student Admission Report
    Route::get('addmision',[ReportController::class,'addmision_index'])->name('admission.report');
    Route::get('get-addmision',[ReportController::class,'get_addmision_report'])->name('get.addmision.report');

    // Student register Report
    Route::get('register',[ReportController::class,'register_index'])->name('register.report');
    Route::get('get-regester',[ReportController::class,'get_register_report'])->name('get.register.report');

    // Student register Report
    Route::get('course-session',[ReportController::class,'course_session_index'])->name('course.session.index');
    Route::get('get-course-session',[ReportController::class,'course_session_report'])->name('get.course.session.report');


})->middleware(['superAdmin','institute']);


// ->middleware('superAdmin');

Route::middleware(['superAdmin'])->group(function () {
    Route::get('admin/dashboard',[adminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('admin/dashboard/filter',[adminController::class,'filter'])->name('admin.dashboard.filter');
    Route::get('admin/latest-admission/get',[adminController::class,'latest_addmision'])->name('latest.addmision');
    // Institute Dashboard
    Route::prefix('Registrations/')->group(function(){

      Route::get('session/time',[RegistrationController::class,'Session_time'])->name('session.time');

      Route::post('insert',[RegistrationController::class,'register_time_insert']);
      Route::get('edit/{id}',[RegistrationController::class,'register_time_edit']);
      Route::post('Update/{id}',[RegistrationController::class,'update'])->name('session_time.update');
      Route::post('delete/{id}',[RegistrationController::class,'delete']);
    });

    Route::prefix('account/')->middleware(['superAdmin'])->group(function(){

        // account routes
        Route::get('/index',[AccountController::class,'account'])->name('account.index');
        Route::post('/store',[AccountController::class,'account_store'])->name('account.store');
        Route::get('/edit/{id}',[AccountController::class,'account_edit'])->name('account.edit');
        Route::post('/update/{id}',[AccountController::class,'account_update'])->name('account.update');
        Route::get('/delete/{id}',[AccountController::class,'account_destroy'])->name('account.destroy');
        Route::get('status/{id}',[AccountController::class,'status'])->name('account.status');

        // new deposite route
        Route::get('new/deposit',[AccountController::class,'new_deposite'])->name('account.new.deposite');
        Route::get('get/session',[AccountController::class,'get_session'])->name('get.session.newDepo');
        Route::get('transaction/all',[AccountController::class,'all_transaction'])->name('all.transaction');

    });



  //branch all url

  Route::get('branch/all',[BranchController::class,'all'])->name('all.branch');
  Route::get('add_branch',[BranchController::class,'Branch_add'])->name('add.branch');
  Route::post('branch/insert',[BranchController::class,'insert']);
  Route::get('Branch/edit/{id}',[BranchController::class,'edit']);
  Route::post('Branch/upate/{id}',[BranchController::class,'update']);
  Route::post('Branch/delete/{id}',[BranchController::class,'delete']);
  Route::get('Branch/info/{id}',[BranchController::class,'BranchInfo']);
  Route::POST('Generate/Password',[BranchController::class,'genPass']);
  Route::GET('query/pdf',[BranchController::class,'querypdf']);
  Route::GET('Send/mail/{id}',[BranchController::class,'sendMail']);
  //smtp setting
  Route::prefix('smtp/')->group(function(){
    Route::get('setting',[SMTPController::class,'index']);
    Route::post('update/{id}',[SMTPController::class,'store']);
  });
  //branch subscription
  Route::post('branch/subscription/insert',[BranchSubsController::class,'Branch_subscription']);

  Route::prefix('School/subscription/')->group(function(){
    Route::get('list/all',[BranchSubsController::class,'allSubscription'])->name('all.subscription');
    Route::get('subscription/edit/{id}',[BranchSubsController::class,'editsubscription']);
    Route::post('subscription/update/{id}',[BranchSubsController::class,'updatesubscription']);
    Route::post('subscription/delete/{id}',[BranchSubsController::class,'deletesubscription']);
    Route::get('Package/all',[schoolSubcription::class,'allPlan'])->name('all.plan.packege');
    Route::get('Package/add',[schoolSubcription::class,'addPlan']);
    Route::post('Package/insert',[schoolSubcription::class,'insertPlan']);
    Route::get('Package/edit/{id}',[schoolSubcription::class,'editPlan']);
    Route::post('Package/update/{id}',[schoolSubcription::class,'updatePlan']);
    Route::post('Package/delete/{id}',[schoolSubcription::class,'deletePlan']);

  });


//course
  Route::prefix('course/')->group(function(){
    Route::get('all',[CourseController::class,'allCourse'])->name('all.course');
    Route::get('add',[CourseController::class,'addCourse'])->name('add.course');
    Route::post('insert',[CourseController::class,'insertCourse']);
    Route::get('edit/{id}',[CourseController::class,'editCourse']);
    Route::post('update/{id}',[CourseController::class,'updateCourse']);
    Route::post('delete/{id}',[CourseController::class,'deleteCourse']);
    Route::get('search',[CourseController::class,'searchCourse']);
  });

  Route::get('Academic/curriculum/index',[CourseController::class,'index']);


//session
  Route::prefix('Session/')->group(function(){
    Route::get('all',[SessionController::class,'allSession'])->name('all.session');
    Route::get('add',[SessionController::class,'addSession'])->name('add.session');
    Route::post('insert',[SessionController::class,'insertSession']);
    Route::get('edit/{id}',[SessionController::class,'editSession']);
    Route::post('update/{id}',[SessionController::class,'updateSession']);
    Route::post('delete/{id}',[SessionController::class,'deleteSession']);

  });
//exam Setup
// Route::prefix('exam-type/')->group(function(){

//     Route::get('index',[ExamTypeController::class,'index'])->name('exam.type.index');
//     Route::post('store',[ExamTypeController::class,'store'])->name('exam.type.store');
//     Route::get('edit/{id}',[ExamTypeController::class,'edit'])->name('exam.type.edit');
//     Route::post('update/{id}',[ExamTypeController::class,'update'])->name('exam.type.update');
//     Route::get('destroy/{id}',[ExamTypeController::class,'destroy'])->name('exam.type.destroy');
//     Route::get('status/{id}',[ExamTypeController::class,'status'])->name('exam.type.status');

// });

Route::prefix('exam-center/')->group(function(){

    Route::get('index',[ExamCenterController::class,'index'])->name('exam.center.index');
    Route::post('store',[ExamCenterController::class,'store'])->name('exam.center.store');
    Route::get('edit/{id}',[ExamCenterController::class,'edit'])->name('exam.center.edit');
    Route::post('update/{id}',[ExamCenterController::class,'update'])->name('exam.center.update');
    Route::get('destroy/{id}',[ExamCenterController::class,'destroy'])->name('exam.center.destroy');
    Route::get('status/{id}',[ExamCenterController::class,'status'])->name('exam.center.status');

});

Route::prefix('exam-name/')->group(function(){

    Route::get('index',[ExamNameController::class,'index'])->name('exam.name.index');
    Route::post('store',[ExamNameController::class,'store'])->name('exam.name.store');
    Route::get('edit/{id}',[ExamNameController::class,'edit'])->name('exam.name.edit');
    Route::post('update/{id}',[ExamNameController::class,'update'])->name('exam.name.update');
    Route::get('destroy/{id}',[ExamNameController::class,'destroy'])->name('exam.name.destroy');
    Route::get('status/{id}',[ExamNameController::class,'status'])->name('exam.name.status');

});

Route::prefix('exam-setup/')->group(function(){

    Route::get('index',[ExamSetUpController::class,'index'])->name('exam.setup.index');
    Route::get('create',[ExamSetUpController::class,'create'])->name('exam.setup.create');
    Route::post('store',[ExamSetUpController::class,'store'])->name('exam.setup.store');
    Route::get('edit/{id}',[ExamSetUpController::class,'edit'])->name('exam.setup.edit');
    Route::post('update/{id}',[ExamSetUpController::class,'update'])->name('exam.setup.update');
    Route::get('delete/{id}',[ExamSetUpController::class,'delete'])->name('exam.setup.destroy');
    Route::get('status/{id}',[ExamSetUpController::class,'status'])->name('exam.setup.status');

});


//exam Mark Distribution
Route::prefix('mark-distribution/')->group(function(){

  Route::get('index',[ExamMarkDistributionController::class,'index'])->name('exam.mark.distribution.index');
  Route::get('exam-assign',[ExamMarkDistributionController::class,'exam_mark_assign'])->name('exam.mark.distribution.assign');
  Route::get('filter',[ExamMarkDistributionController::class,'exam_mark_filter'])->name('exam.mark.distribution.filter');
  Route::post('store',[ExamMarkDistributionController::class,'store'])->name('exam.mark.distribution.store');
  Route::get('mark-update',[ExamMarkDistributionController::class,'mark_update'])->name('exam.mark.distribution.update');
  Route::get('isAbsent-update',[ExamMarkDistributionController::class,'isAbsent_update'])->name('exam.mark.distribution.isAbsent.update');

  Route::get('student-assign',[ExamMarkDistributionController::class,'student_assign_index'])->name('student.assign.index');
  Route::get('branch-wise-exam',[ExamMarkDistributionController::class,'get_branch_wise_exam'])->name('get.branch.wise.exam');



  Route::get('create',[ExamMarkDistributionController::class,'create']);
  Route::get('edit/{id}',[ExamMarkDistributionController::class,'edit']);
  Route::post('update/{id}',[ExamMarkDistributionController::class,'update']);
  Route::post('delete/{id}',[ExamMarkDistributionController::class,'delete']);

});

Route::prefix('exam-course/')->group(function(){

  Route::get('index',[ExamSubjectController::class,'index'])->name('exam.course.index');
  Route::post('store',[ExamSubjectController::class,'store'])->name('exam.course.store');
  Route::get('edit/{id}',[ExamSubjectController::class,'edit'])->name('exam.course.edit');
  Route::post('update/{id}',[ExamSubjectController::class,'update'])->name('exam.course.update');
  Route::get('destroy/{id}',[ExamSubjectController::class,'destroy'])->name('exam.course.destroy');

});

Route::prefix('exam-grade/')->group(function(){

  Route::get('index',[GradeController::class,'index'])->name('exam.grade.index');
  Route::post('store',[GradeController::class,'store'])->name('exam.grade.store');
  Route::get('edit/{id}',[GradeController::class,'edit'])->name('exam.grade.edit');
  Route::post('update/{id}',[GradeController::class,'update'])->name('exam.grade.update');
  Route::get('delete/{id}',[GradeController::class,'destroy'])->name('exam.grade.destroy');

});


Route::prefix('student-attendance/')->group(function(){

  Route::get('index',[AttendanceController::class,'index'])->name('attendance.index');
  Route::post('generate',[AttendanceController::class,'pdf_generate'])->name('attendance.pdg.generate');

});

Route::prefix('exam-publish-date/')->group(function(){

  Route::get('index',[ExamPublishController::class,'index'])->name('exam.publish.index');
  Route::post('store',[ExamPublishController::class,'store'])->name('exam.publish.store');
  Route::get('destroy/{id}',[ExamPublishController::class,'destroy'])->name('exam.publish.destroy');
  

});


//admit Card
Route::prefix('cardManagement/')->group(function(){

    // Route::get('registration/svg',[cardManagement::class,'reg_svg'])->name('registration.card');
    Route::get('registration/template',[cardManagement::class,'registration_template'])->name('registration.card.template');
    Route::get('registration/generate/card/student',[cardManagement::class,'registration_generate_card'])->name('registration.generate.card.student');
    Route::post('registerCard/generate',[cardManagement::class,'reg_svg'])->name('registerCard.generate');

    // Route::get('admit/svg',[cardManagement::class,'admit_svg'])->name('admit.card');
    Route::get('admit/template',[cardManagement::class,'admit_template'])->name('admit.card.template');
    Route::get('admit/generate/card/student',[cardManagement::class,'admit_generate_card'])->name('admit.generate.card.student');
    Route::post('admitCard/generate',[cardManagement::class,'admit_svg'])->name('admitCard.generate');
    Route::POST('admitCard/save',[cardManagement::class,'SaveAdmit'])->name('save_admit_card');

    Route::get('create',[cardManagement::class,'create']);
    Route::post('insert',[cardManagement::class,'insert']);
    Route::get('edit/{id}',[cardManagement::class,'edit']);
    Route::post('update/{id}',[cardManagement::class,'update']);
    Route::post('delete/{id}',[cardManagement::class,'delete']);

    // controller signature route
    Route::get('signature',[cardManagement::class,'signature'])->name('controller.signature');
    Route::post('signature/store',[cardManagement::class,'signature_store'])->name('signature.store');
    Route::post('certificate/signature',[CertificateController::class,'certificate_signature'])->name('certificate.signature');

    // Make time for download admit card
    Route::get('card-time-managment',[cardManagement::class,'card_time_index'])->name('card.time.index');
    Route::post('card-time-managment/store',[cardManagement::class,'card_time_store'])->name('card.time.store');
    Route::get('card-time-managment/destroy/{id}',[cardManagement::class,'card_time_destroy'])->name('card.time.destroy');

    // Certificate managment systeam
    Route::get('certificate',[CertificateController::class,'index'])->name('certificate.index');
    Route::post('certificate/generate',[CertificateController::class,'generate'])->name('certificate.generate');

  });

//All Student

  //district all url
  Route::get('add_division',[settingController::class,'division_add']);
  Route::post('add_division/insert',[settingController::class,'division_insert']);
  Route::get('edit/division/{id}',[settingController::class,'division_edit']);
  Route::post('division/update/{id}',[settingController::class,'update_division']);
  Route::get('division/delete/{id}',[settingController::class,'Delete_division']);

  //subdistrict all url
  Route::get('add_district',[settingController::class,'add_district']);
  Route::post('add_district/insert',[settingController::class,'district_insert']);
  Route::get('edit/district/{id}',[settingController::class,'district_edit']);
  Route::post('district/update/{id}',[settingController::class,'update_district']);
  Route::get('district/delete/{id}',[settingController::class,'Delete_district']);
   //education Year Setting
   Route::get('education_year/add',[settingController::class,'addEducationYear']);
   Route::post('education_year/insert',[settingController::class,'insertEducationYear']);
//    Route::get('education_year/edit/{id}',[settingController::class,'editEducationYear']);
   Route::post('education_year/update/{id}',[settingController::class,'updateEducationYear']);
   Route::post('education_year/current/change/{id}',[settingController::class,'updateEducationYearCurrent']);
   Route::post('education_year/delete/{id}',[settingController::class,'deleteEducationYear']);
   Route::get('education_year/info/{id}',[settingController::class,'educationYearInfo']);

   Route::prefix('SystemSettings/')->group(function(){
   Route::get('index',[settingController::class,'index'])->name('systeam.settings');

    //logo and seo
    Route::get('Backend/Settings/logo',[settingController::class,'logoset']);
    Route::POST('logo/update/{id}',[settingController::class,'logoUpdate']);
    Route::get('Backend/Settings/seo',[settingController::class,'seoSettings']);
    Route::POST('seo/update/{id}',[settingController::class,'seoUpdate']);
    //payment gateway
    Route::get('Backend/Settings/paymentGateway',[settingController::class,'paymentGatewaySettings']);
    Route::get('bkash_custom',[settingController::class,'bkash_custom']);
    Route::POST('BkashGateway/update/{id}',[settingController::class,'BkashGatewayUpdate']);
    Route::get('nagad_custom',[settingController::class,'nagad_custom']);
    Route::post('nagadGateway/update/{id}',[settingController::class,'nagadGatewayUpdate'])->name('nagad_gateway.update');
    Route::get('rocket_custom',[settingController::class,'rocket_custom']);

    Route::get('Backend/Settings',[settingController::class,'BackendEdit']);
    Route::POST('update/{id}',[settingController::class,'BackendUpdate']);
  });



  Route::prefix('notice/')->group(function(){
    Route::get('all',[NoticeController::class,'all'])->name('all.notice');
    Route::get('index',[NoticeController::class,'index'])->name('notice.index');
    Route::post('insert',[NoticeController::class,'insert']);
    Route::get('edit/{id}',[NoticeController::class,'edit']);
    Route::post('update/{id}',[NoticeController::class,'update']);
    Route::post('delete/{id}',[NoticeController::class,'delete']);
    //add Registration Fund

  });
  Route::post('/upload', [NoticeController::class, 'uploadImage'])->name('upload.image');

  // Route::post('ckeditor/upload', [NoticeController::class, 'upload'])->name('ckeditor.upload');



Route::group(['middleware' => ['web']], function () {
  // Payment Routes for bKash


  //search payment
  Route::get('/bkash/search/{trxID}', [App\Http\Controllers\BkashTokenizePaymentController::class,'searchTnx'])->name('bkash-serach');

  //refund payment routes
  Route::get('/bkash/refund', [App\Http\Controllers\BkashTokenizePaymentController::class,'refund'])->name('bkash-refund');
  Route::get('/bkash/refund/status', [App\Http\Controllers\BkashTokenizePaymentController::class,'refundStatus'])->name('bkash-refund-status');
});
//catch for b-kash pay amaount
Route::post('/store-payment-data', [BkashPaymentController::class, 'catchAmountPay']);

  //default settings
  Route::get('get_districts',[settingController::class,'getDistrictByDivision']);
});
  //authentication

  // Admit card, registration card & certificate card generate from institute

    Route::get('institute-card-index',[cardManagement::class,'institute_card_index'])->name('institute.card.index');
    Route::get('isn/admitCard/generate',[cardManagement::class,'institute_download_admit_svg'])->name('ins.admitCard.download');

    // regeistration card templete generate in institute panel
    Route::get('ins/registration/template',[cardManagement::class,'institute_registration_template'])->name('ins.registration.card.template');
    Route::get('inst-reg/generate/card/student',[cardManagement::class,'institute_registration_generate_card'])->name('institute.registration.generate');
    Route::post('isn/reg-card/generate/svg',[cardManagement::class,'institute_download_reg_svg'])->name('ins.registration.download');



Route::prefix('Login/')->group(function(){
  Route::post('AuthCheck',[AuthController::class,'loginCheck']);
  Route::get('log',[AuthController::class,'login'])->name('institute.login');
});

Route::get('admin/login',[AuthController::class,'adminlogin'])->name('admin.login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
