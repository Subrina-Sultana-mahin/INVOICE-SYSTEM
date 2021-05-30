<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomersController;
use App\Http\Controllers\Backend\ExpensesController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\InvoicesController;
use App\Http\Controllers\Backend\ItemsController;
use App\Http\Controllers\Backend\PaymentsController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\order\orders;
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

// Route::get('/', function () {
//     return view('backend.main');
// });



Route::get('/', [UsersController::class, 'ShowLoginForm'])->name('login.list');
Route::post('/login', [UsersController::class, 'login'])->name('login');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin-middleware'], function () {
        Route::get('/dashboard', [HomeController::class, 'home'])->name('home');
        //customers
        Route::get('/customers', [CustomersController::class, 'customers'])->name('customer.list');
        Route::get('/add-customer', [CustomersController::class, 'addCustomer'])->name('addCustomer.list');
        Route::post('/add-customer', [CustomersController::class, 'createCustomer'])->name('addCustomer.create');
        Route::get('/customer/delete/{id}', [CustomersController::class, 'delete'])->name("customer.delete");
       // Route::get('/customer/edit/', [CustomersController::class, 'editcustomer'])->name("customer.edit");


        Route::get('/items', [ItemsController::class, 'items'])->name('item.list');
        Route::get('/add-item', [ItemsController::class, 'addItem'])->name('addItem.list');
        Route::post('/add-item', [ItemsController::class, 'createItem'])->name('addItem.create');
        Route::get('/item/delete/{id}', [ItemsController::class, 'delete'])->name("item.delete");


        Route::get('/invoices', [InvoicesController::class, 'invoices'])->name('invoice.list');
        Route::post('/invoices/item', [InvoicesController::class, 'itemSold'])->name('itemSold.list');
        Route::get('/invoices/delete/{id}', [InvoicesController::class, 'delete'])->name("invoice.delete");

        Route::get('/invoicesCreate', [InvoicesController::class, 'invoicesCreate'])->name('invoice.create');
        Route::post('/invoicesCreate', [InvoicesController::class, 'saleItemCreate'])->name('saleItem.create');
        Route::get('/invoicesCreate/delete/{id}', [InvoicesController::class, 'saleItemDelete'])->name('saleItem.delete');


        Route::get('/payments', [PaymentsController::class, 'payments'])->name('payment.list');


        Route::get('/expenses', [ExpensesController::class, 'expenses'])->name('expenses.list');
        Route::get('/add-expenses', [ExpensesController::class, 'addExpenses'])->name('addExpenses.list');
        Route::post('/add-expenses', [ExpensesController::class, 'createExpenses'])->name('addExpenses.create');
        Route::get('/expenses/delete/{id}', [ExpensesController::class, 'delete'])->name("expenses.delete");

         Route::get('/expensesCategory', [ExpensesController::class, 'expensesCategory'])->name('expensesCategory.list');
         Route::get('/add-expensesCategory', [ExpensesController::class, 'addExpensesCategory'])->name('addExpensesCategory.list');
         Route::post('/add-expensesCategory', [ExpensesController::class, 'createExpensesCategory'])->name('addExpensesCategory.create');
         Route::get('/expensesCategory/delete/{id}', [ExpensesController::class, 'expensesCategorydelete'])->name("expensesCategory.delete");

        Route::get('/users', [UsersController::class, 'users'])->name('user.list');
        Route::get('/add-user', [UsersController::class, 'addUser'])->name('addUser.list');

        Route::get('/get-customer/{id}', [ApiController::class, 'customerDetails']);




    });
});
