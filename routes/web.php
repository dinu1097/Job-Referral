<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\ReferrerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CompanyController;


Route::get('/job-seeker/profile', [ProfileController::class, 'createJobSeekerProfile'])->name('jobseeker.profile');
Route::get('/job-seeker/dashboard', [DashboardController::class, 'jobSeekerDashboard'])->name('jobseeker.dashboard');

// Referrer Routes
Route::get('/referrer/profile', [ProfileController::class, 'createReferrerProfile'])->name('referrer.profile');
Route::get('/referrer/dashboard', [DashboardController::class, 'referrerDashboard'])->name('referrer.dashboard');

// Request Referrals
Route::get('/request-referrals', [CompanyController::class, 'listCompanies'])->name('request.referrals');
Route::post('/apply/{company}', [CompanyController::class, 'applyToCompany'])->name('apply.company');



// Authentication Routes
Route::get('/signup', [AuthController::class, 'showSignUp'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::get('/jobseekers/applications', [ReferrerController::class, 'indexRequest'])->name('jobseekers.applications');
    Route::post('/jobseekers/applications/update-status', [ReferrerController::class, 'updateReferralStatus'])->name('jobseeker.updateStatus');

    Route::get('/jobseeker/requests', [JobSeekerController::class, 'showJobSeekerRequests'])->name('jobseeker.requests');

    // Job Seeker Routes
    Route::get('/profile/create', [JobSeekerController::class, 'createProfileView'])->name('profile.create');
    Route::post('/profile/create', [JobSeekerController::class, 'createProfile'])->name('profile.create.post');
    Route::get('/profile/edit/{id}', [JobSeekerController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/edit/{id}', [JobSeekerController::class, 'editProfile'])->name('profile.edit.post');
    Route::get('/profile/{id}', [JobSeekerController::class, 'viewProfile'])->name('profile.view');
    Route::get('/marketplace', [JobSeekerController::class, 'listMarketPlace'])->name('marketplace');
    Route::get('/home', [JobSeekerController::class, 'listMarketPlace'])->name('home');

    // Referrer Routes
    Route::get('/refer', [ReferrerController::class, 'referJobSeeker'])->name('refer');
    Route::post('/refer/{jobSeekerId}', [ReferrerController::class, 'referJobSeeker'])->name('refer.post');
    Route::get('/dashboard', [ReferrerController::class, 'viewReferrals'])->name('dashboard');
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chatbox', [ChatController::class, 'indexbox'])->name('chatbox');
    Route::post('/chat/select', [ChatController::class, 'selectUser'])->name('chat.select');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    // Search Routes
    Route::get('/search', [SearchController::class, 'searchMarketPlace'])->name('search');
});


Route::get('/', function () {
    return redirect()->route('marketplace');
});

// Route::get('/referrer', function () {
//     return view('Referrer.create');
// })->name('referrer.create');
Route::get('/referrer', [ReferrerController::class, 'create'])->name('referrer.create');
Route::post('/referrer/profile', [ReferrerController::class, 'store'])->name('referrer.store');
Route::get('/referrer-request', function () {
    return view('Referrer.request');
})->name('referrer.request');
Route::get('/referrer-show', function () {
    return view('Referrer.show');
})->name('referrer.show');

Route::get('/jobseeker-create', function () {
    return view('JobSeeker.create');
})->name('JobSeeker.create');
Route::get('/jobseeker-request', function () {
    return view('JobSeeker.request');
})->name('JobSeeker.request');
Route::get('/jobseeker-show', function () {
    return view('JobSeeker.show');
})->name('JobSeeker.show');

Route::get('/auth', function () {
    dd(Auth::id());
});
Route::get('/request-referral', [CompanyController::class, 'index'])->name('referrer.request-referrals');
Route::post('/apply-for-company', [CompanyController::class, 'createCompanyApplicationRequest'])->name('company.apply-referrals');

