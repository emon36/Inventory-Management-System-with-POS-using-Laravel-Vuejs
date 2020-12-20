<?php
use Illuminate\Http\Request;
use Illuminate\Http\Facdes\routes;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExpenseControlller;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\POScontroller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;




Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
    

});

Route::apiResource('/employee',EmployeeController::class);
Route::apiResource('/supplier',SupplierController::class);
Route::apiResource('/category',CategoryController::class);
Route::apiResource('/product',ProductController::class);
Route::apiResource('/expense',ExpenseControlller::class);
Route::apiResource('/customer',CustomerController::class);


Route::Post('/salary/paid/{id}',[SalaryController::class,'Paid' ]);
Route::Get('/salary',[SalaryController::class,'allSalary' ]);
Route::Get('/salary/view/{id}',[SalaryController::class,'viewSalary' ]);
Route::Get('/edit/salary/{id}',[SalaryController::class,'editSalary' ]);

Route::post('/salary/update/{id}',[SalaryController::class,'salaryUpdate' ]);
Route::post('/stock/update/{id}',[ProductController::class,'stockUpdate' ]);

Route::Get('/getting/product/{id}',[POScontroller::class,'getproduct' ]);


Route::Get('/addToCart/{id}',[CartController::class,'addToCart' ]);
Route::Get('/cart/product',[CartController::class,'productCart' ]);
Route::Get('/remove/cart/{id}',[CartController::class,'removeCart' ]);
Route::Get('/cart/increment/{id}',[CartController::class,'incremetCart' ]);
Route::Get('/cart/decrement/{id}',[CartController::class,'decrementCart' ]);
Route::Get('/vats',[CartController::class,'vats' ]);




Route::post('/orderplace',[POScontroller::class,'orderPlace' ]);

Route::Get('/order',[OrderController::class,'CurrentOrder' ]);

Route::Get('/order/details/{id}',[OrderController::class,'OrderDetails' ]);
Route::Get('/order/orderdetails/{id}',[OrderController::class,'OrderDetailsAll' ]);

Route::post('/search/order',[POScontroller::class,'orderSearch' ]);

//Admin Dashboard 
Route::Get('/today/sell',[POScontroller::class,'todaySell' ]);

Route::Get('/today/income',[POScontroller::class,'todayIncome' ]);
Route::Get('/today/due',[POScontroller::class,'todayDue' ]);
Route::Get('/today/expense',[POScontroller::class,'todayExpense' ]);
Route::Get('/stockout',[POScontroller::class,'Stockout' ]);





