<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Frontend Routes
Route::name('frontend.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about-us', [HomeController::class, 'about'])->name('about');
    Route::get('/our-range', [HomeController::class, 'offer'])->name('offer');
    Route::get('/our-range/{serviceSlug}', [HomeController::class, 'serviceDetail'])->name('service-detail');
    Route::get('/our-customers', [HomeController::class, 'clients'])->name('clients');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('/contact', [HomeController::class, 'submitContact'])->name('contact.submit');
    Route::get('/{slug}', [HomeController::class, 'page'])->name('page')->where('slug', '^(?!admin|login|logout|register|password).*$');
});

// Public logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Login (public within admin group)
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    
    // Protected Admin Routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        
        // Pages
        Route::resource('pages', App\Http\Controllers\Admin\PageController::class);

        // Services
        Route::resource('services', App\Http\Controllers\Admin\ServiceController::class)->except(['show']);
        
        // Contacts
        Route::resource('contacts', App\Http\Controllers\Admin\ContactController::class)->except(['create', 'store', 'edit', 'update']);
        Route::post('contacts/{contact}/mark-read', [App\Http\Controllers\Admin\ContactController::class, 'markAsRead'])->name('contacts.mark-read');
        Route::post('contacts/{contact}/mark-replied', [App\Http\Controllers\Admin\ContactController::class, 'markAsReplied'])->name('contacts.mark-replied');
        Route::post('contacts/{contact}/archive', [App\Http\Controllers\Admin\ContactController::class, 'archive'])->name('contacts.archive');
        Route::post('contacts/bulk-update', [App\Http\Controllers\Admin\ContactController::class, 'bulkUpdate'])->name('contacts.bulk-update');
        Route::get('contacts/export', [App\Http\Controllers\Admin\ContactController::class, 'export'])->name('contacts.export');
        
        // Email Templates
        Route::resource('email-templates', App\Http\Controllers\Admin\EmailTemplateController::class);
        Route::post('email-templates/{emailTemplate}/duplicate', [App\Http\Controllers\Admin\EmailTemplateController::class, 'duplicate'])->name('email-templates.duplicate');
        Route::get('email-templates/{emailTemplate}/preview', [App\Http\Controllers\Admin\EmailTemplateController::class, 'preview'])->name('email-templates.preview');
        Route::post('email-templates/{emailTemplate}/send-test', [App\Http\Controllers\Admin\EmailTemplateController::class, 'sendTest'])->name('email-templates.send-test');
        Route::post('email-templates/create-defaults', [App\Http\Controllers\Admin\EmailTemplateController::class, 'createDefaults'])->name('email-templates.create-defaults');
        
        // Users
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
        Route::post('users/{user}/toggle-status', [App\Http\Controllers\Admin\UserController::class, 'toggleStatus'])->name('users.toggle-status');
        
        // Settings
        Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
        Route::get('settings/general', [App\Http\Controllers\Admin\SettingController::class, 'general'])->name('settings.general');
        Route::post('settings/general', [App\Http\Controllers\Admin\SettingController::class, 'updateGroup'])->name('settings.general.update');
        Route::get('settings/email', [App\Http\Controllers\Admin\SettingController::class, 'email'])->name('settings.email');
        Route::post('settings/email', [App\Http\Controllers\Admin\SettingController::class, 'updateGroup'])->name('settings.email.update');
        Route::get('settings/seo', [App\Http\Controllers\Admin\SettingController::class, 'seo'])->name('settings.seo');
        Route::post('settings/seo', [App\Http\Controllers\Admin\SettingController::class, 'updateGroup'])->name('settings.seo.update');
        Route::get('settings/integrations', [App\Http\Controllers\Admin\SettingController::class, 'integrations'])->name('settings.integrations');
        Route::post('settings/integrations', [App\Http\Controllers\Admin\SettingController::class, 'updateGroup'])->name('settings.integrations.update');
        Route::post('settings/reset', [App\Http\Controllers\Admin\SettingController::class, 'resetToDefault'])->name('settings.reset');
        
        // Activity Logs
        Route::resource('activity-logs', App\Http\Controllers\Admin\ActivityLogController::class)->only(['index', 'show']);
        Route::get('activity-logs/export', [App\Http\Controllers\Admin\ActivityLogController::class, 'export'])->name('activity-logs.export');
        Route::post('activity-logs/clear-old', [App\Http\Controllers\Admin\ActivityLogController::class, 'clearOld'])->name('activity-logs.clear-old');
        
        // System
        Route::get('system/info', [App\Http\Controllers\Admin\SystemController::class, 'info'])->name('system.info');
        Route::get('system/logs', [App\Http\Controllers\Admin\SystemController::class, 'logs'])->name('system.logs');
        Route::post('system/clear-cache', [App\Http\Controllers\Admin\SystemController::class, 'clearCache'])->name('system.clear-cache');
        Route::post('system/clear-logs', [App\Http\Controllers\Admin\SystemController::class, 'clearLogs'])->name('system.clear-logs');
        Route::post('system/optimize', [App\Http\Controllers\Admin\SystemController::class, 'optimize'])->name('system.optimize');
    });
});
