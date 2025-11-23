<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Admin\{
    DashboardController,
    UserController,
    EventController,
    ActionController as AdminActionController,
    PaymentController,
    InvoiceController,
    AttendanceController,
    PostController,
    NewsletterController,
    MediaController,
    DocumentController
};
use App\Http\Controllers\Public\{
    HomeController,
    BlogController,
    ActionController,
    ContactController,
    PartnerController
};
use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController,
    ForgotPasswordController
};

//Routes publiques
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/actions', [ActionController::class, 'index'])->name('actions.index');
Route::get('/actions/{slug}', [ActionController::class, 'show'])->name('actions.show');
Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

//Routes Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//Routes Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Utilisateurs
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); // liste des utilisateurs
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // formulaire création utilisateur
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); // stockage nouvel utilisateur
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // formulaire édition utilisateur
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // mise à jour utilisateur
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // suppression utilisateur
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show'); // détail utilisateur

    // Événements
    Route::get('/events', [EventController::class, 'index'])->name('events.index'); // liste des événements
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create'); // formulaire création événement
    Route::post('/events', [EventController::class, 'store'])->name('events.store'); // stockage nouvel événement
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit'); // formulaire édition événement
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update'); // mise à jour événement
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy'); // suppression événement
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show'); // détail événement

    // Actions
    Route::get('/actions', [ActionController::class, 'index'])->name('actions.index'); 
    Route::get('/actions/create', [ActionController::class, 'create'])->name('actions.create'); 
    Route::get('/actions/{action}/edit', [ActionController::class, 'edit'])->name('actions.edit'); 
    Route::post('/actions', [ActionController::class, 'store'])->name('actions.store'); 
    Route::put('/actions/{action}', [ActionController::class, 'update'])->name('actions.update'); 
    Route::delete('/actions/{action}', [ActionController::class, 'destroy'])->name('actions.destroy'); 
    Route::get('/actions/{slug}', [ActionController::class, 'show'])->name('actions.show'); 
    
    // Paiements
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index'); // liste des paiements
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create'); // formulaire création paiement
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store'); // stockage nouveau paiement
    Route::get('/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('payments.edit'); // formulaire édition paiement
    Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update'); // mise à jour paiement
    Route::delete('/payments/{payment}', [PaymentController::class, 'destroy'])->name('payments.destroy'); // suppression paiement
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show'); // détail paiement

    // Factures (Invoices)
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create'); // formulaire création facture
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store'); // stockage nouvelle facture
    Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit'); // formulaire édition facture
    Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update'); // mise à jour facture
    Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy'); // suppression facture
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');

    //Attendances
    Route::get('/attendances', [EventController::class, 'attendances'])->name('attendances.index');
    Route::get('/attendances/create', [EventController::class, 'createAttendance'])->name('attendances.create');
    Route::post('/attendances', [EventController::class, 'storeAttendance'])->name('attendances.store');
    Route::get('/attendances/{attendance}/edit', [EventController::class, 'editAttendance'])->name('attendances.edit');
    Route::put('/attendances/{attendance}', [EventController::class, 'updateAttendance'])->name('attendances.update');
    Route::delete('/attendances/{attendance}', [EventController::class, 'destroyAttendance'])->name('attendances.destroy');
    Route::get('/attendances/{event}', [EventController::class, 'attendanceDetail'])->name('attendances.show');
    Route::get('/events/{event}/attendances', [EventController::class, 'attendances'])->name('events.attendances');

    // Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

   //Medias
    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
    Route::get('/media/create', [MediaController::class, 'create'])->name('media.create');
    Route::post('/media', [MediaController::class, 'store'])->name('media.store');
    Route::get('/media/{media}/edit', [MediaController::class, 'edit'])->name('media.edit');
    Route::put('/media/{media}', [MediaController::class, 'update'])->name('media.update');
    Route::get('/media/{media}', [MediaController::class, 'show'])->name('media.show');
    Route::post('/media/upload', [MediaController::class, 'store'])->name('media.upload');
    Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');

    // Documents
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
    Route::post('/documents/upload', [DocumentController::class, 'store'])->name('documents.upload');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    //Newsletter
    Route::get('/newsletter', [PostController::class, 'index'])->name('newsletters.index');
    Route::get('/newsletter/create', [PostController::class, 'create'])->name('newsletters.create');
    Route::post('/newsletter', [PostController::class, 'store'])->name('newsletters.store');
    Route::get('/newsletter/{post}', [PostController::class, 'show'])->name('newsletters.show');
    Route::get('/newsletter/{post}/edit', [PostController::class, 'edit'])->name('newsletters.edit');
    Route::put('/newsletter/{post}', [PostController::class, 'update'])->name('newsletters.update');
    Route::delete('/newsletter/{post}', [PostController::class, 'destroy'])->name('newsletters.destroy');
    Route::post('/newsletter/send', [PostController::class, 'sendNewsletter'])->name('newsletters.send');

});

//Routes Blog 

    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


    //Route de debug 

Route::get('/debug-api-routes', function () {
    $routes = collect(App::make('router')->getRoutes()->getIterator())
        ->filter(fn($route) => str_starts_with($route->uri(), 'api/'))
        ->map(fn($route) => [
            'method' => implode('|', $route->methods()),
            'uri' => $route->uri(),
            'name' => $route->getName(),
            'action' => $route->getActionName(),
        ]);

    return view('debug.api-routes', compact('routes'));
});
