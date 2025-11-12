<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController,
    UserController,
    RoleController,
    PaymentController,
    InvoiceController,
    EventController,
    AttendanceController,
    DocumentController,
    MediaController,
    NewsletterController,
    ReportController
};

/*
|--------------------------------------------------------------------------
| Routes Admin protégées
|--------------------------------------------------------------------------
| Accessible uniquement aux utilisateurs authentifiés (middleware auth + role).
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Tableau de bord
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Gestion utilisateurs et rôles
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);

    // Paiements et factures
    Route::resource('/payments', PaymentController::class);
    Route::resource('/invoices', InvoiceController::class);

    // Événements et présences
    Route::resource('/events', EventController::class);
    Route::resource('/attendances', AttendanceController::class);

    // Actions et documents
    Route::resource('/documents', DocumentController::class);
    Route::resource('/media', MediaController::class);

    // Newsletters et rapports
    Route::resource('/newsletters', NewsletterController::class);
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});

