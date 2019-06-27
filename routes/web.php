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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// EMPLOYEE CONTROLLER WORK HERE
Route::resource('employee', 'EmployeesController');
Route::resource('customer', 'CustomerController');
Route::resource('supplier', 'SupplierController');
Route::resource('category', 'CategoryController');
Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');

//excel import and export
Route::get('/import-product','ProductController@ImportProduct')->name('import.product');
Route::get('/export','ProductController@export')->name('export');
Route::post('/import','ProductController@import')->name('import');


//Expense routes are here---------------------
Route::get('/add-expense','ExpenseController@AddExpense')->name('add.expense');
Route::post('/insert-expense','ExpenseController@InserExpense');
Route::get('/today-expense','ExpenseController@TodayExpense')->name('today.expense');
Route::get('/edit-today-expense/{id}', 'ExpenseController@EditTodayExpense');
Route::post('/update-expense/{id}','ExpenseController@UpdateExpense');
Route::get('/monthly-expense','ExpenseController@MonthlyExpense')->name('monthly.expense');
Route::get('/yearly-expense','ExpenseController@YearlyExpense')->name('yearly.expense');

//monthly more expenses----
Route::get('/january-expense','ExpenseController@JanuaryExpense')->name('january.expense');
Route::get('/february-expense','ExpenseController@FebruaryExpense')->name('february.expense');
Route::get('/march-expense','ExpenseController@MarchExpense')->name('march.expense');
Route::get('/april-expense','ExpenseController@AprilExpense')->name('april.expense');
Route::get('/may-expense','ExpenseController@MayExpense')->name('may.expense');
Route::get('/june-expense','ExpenseController@JuneExpense')->name('june.expense');
Route::get('/july-expense','ExpenseController@JulyExpense')->name('july.expense');
Route::get('/august-expense','ExpenseController@AugustExpense')->name('august.expense');
Route::get('/september-expense','ExpenseController@SeptemberExpense')->name('september.expense');
Route::get('/october-expense','ExpenseController@OctoberExpense')->name('october.expense');
Route::get('/november-expense','ExpenseController@NovemberExpense')->name('november.expense');
Route::get('/december-expense','ExpenseController@DecemberExpense')->name('december.expense');

//Attendences routes are here-----------------------
Route::get('/take-attendence','AttendenceController@TakeAttendance')->name('take.attendence');
Route::post('/insert-attendence','AttendenceController@InsertAttendance');
Route::get('/all-attendence','AttendenceController@AllAttndance')->name('all.attendence');
Route::get('/edit-attendence/{edit_date}', 'AttendenceController@EditAttednece');
Route::post('/update-attendence','AttendenceController@UpdateAttendence');
Route::get('/view-attendence/{edit_date}', 'AttendenceController@ViewAttednece');

//settings routes
Route::get('/website-settings','SettingController@Setting')->name('settings');
Route::post('/update-website/{id}', 'SettingController@UpdateWebsite')->name('setting.update');

//pos routes are here
Route::get('/pos','PosController@index')->name('pos');

//Cart controller
Route::post('/add-cart', 'CartController@index');
Route::post('/cart-update/{rowId}', 'CartController@CartUpdate');
Route::get('/cart-remove/{rowId}', 'CartController@CartRemove');
Route::post('/invoice', 'CartController@CreateInvoice');
Route::post('/final-invoice', 'CartController@FinalInvoice');

// Order controller
Route::get('/pending/order','OrderController@PendingOrder')->name('pending.orders');
Route::get('/view-order-status/{id}','OrderController@ViewOrder');
Route::get('/pos-done/{id}','OrderController@PosDONE');
Route::get('/success/order','OrderController@SuccessOrder')->name('success.orders');
