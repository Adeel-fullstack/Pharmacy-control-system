<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Sales\{NewSales, Sales, Customers, SaleHistory};
use App\Livewire\Employees\{NewEmployee, Allemployee, Department, Designation};
use App\Livewire\Usermanage\{AddUser, Manageusers, EditUser, Permissions, Roles};
use App\Livewire\Billing\Invoices;
use App\Livewire\Customer;
use App\Livewire\Profile\{MyProfile, Settings, Help, Faq};
use App\Livewire\Shortcuts\Calendar;
use App\Livewire\Stock\{NewStock, StockList, StockRequired, Suggestions, Companies, Distributors, Type};
use App\Livewire\Dashboard;
use App\Livewire\Auth\{Login, Register};
use App\Livewire\General;
use App\Livewire\General\Paymentgateway;
use App\Livewire\Salebill;
use App\Livewire\EmailUsers;


// Public routes (no authentication required)
Route::get('/login', Login::class)->name('login');
 Route::get('/register', Register::class)->name('register');
 Route::post('/register', Register::class);

// Protect all other routes using the 'auth' middleware
Route::middleware('auth')->prefix('admin')->group(function () {

    // Dashboard route
    Route::get('/', Dashboard::class)->name('dashboard');

    // Sales routes
    Route::prefix('sales')->group(function () {
        Route::get('/newsales', NewSales::class)->name('sales.new');
        Route::get('/sales', Sales::class)->name('sales.sales');
        Route::get('/customers', Customers::class)->name('sales.customers');
        Route::get('/sale-history', SaleHistory::class)->name('sales.history');


    });

    // Employees routes
    Route::prefix('employees')->group(function () {
        Route::get('newemployee', NewEmployee::class)->name('employee.new');
        Route::get('allemployee', Allemployee::class)->name('employee.all');
        Route::get('designation', Designation::class)->name('employee.designation');
        Route::get('department', Department::class)->name('employee.department');
    }); 

    // Customer route
    Route::get('/customers', Customer::class)->name('customer');

    //salebill route
    Route::get('/salebill', Salebill::class)->name('salebill');
    Route::get('/salebill/download/{order_id}', [Salebill::class, 'downloadPdf'])->name('page.downloadPdf');

    // User management routes
    Route::prefix('UserManagement')->group(function () {
        Route::get('/adduser', AddUser::class)->name('userman.adduser');
        Route::get('/manageusers', Manageusers::class)->name('userman.manageusers');
        Route::get('/users/edit/{user}', EditUser::class)->name('userman.edituser');
        Route::get('/roles', Roles::class)->name('userman.roles');
        Route::get('/permissions', Permissions::class)->name('userman.permissions');
    });

    // Billing routes
    Route::prefix('Billing')->group(function () {
        Route::get('/invoices', Invoices::class)->name('billing.invoices');
    });

    //General routes
    Route::prefix('General')->group(function(){
        Route::get('/general', General::class)->name('general.general');
        Route::get('/paymentgateway', Paymentgateway::class)->name('general.paygate');
    });

    // Stock routes
    Route::prefix('stock')->group(function () {
        Route::get('/new', NewStock::class)->name('stock.new');
        Route::get('/stocklist', StockList::class)->name('stock.list');
        Route::get('/stockrequired', StockRequired::class)->name('stock.required');
        Route::get('/suggestions', Suggestions::class)->name('stock.suggestions');
        Route::get('/companies', Companies::class)->name('stock.companies');
        Route::get('/distributors', Distributors::class)->name('stock.distributors');
        Route::get('/type', Type::class)->name('stock.type');
        Route::get('/email',EmailUsers::class)->name('stock.email-users');
    });

    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/myprofile', MyProfile::class)->name('profile.myprofile');
        Route::get('/settings', Settings::class)->name('profile.settings');
        Route::get('/help', Help::class)->name('profile.help');
        Route::get('/faq', Faq::class)->name('profile.faq');
    });

    // Shortcuts routes
    Route::prefix('shortcuts')->group(function () {
        Route::get('/calendar', Calendar::class)->name('shortcuts.calendar');
    });
});
