<?php

use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\admin\TaiKhoanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckRoleAdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use NunoMaduro\Collision\Provider;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/danhmucs', function () {
    return view('admins.danhmucs.index');
});

Route::get('login', [AuthController::class, 'showFormLogin']);
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('register', [AuthController::class, 'showFormRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/home', [HomeController::class, 'index'])->name('index');

// Route::get('/admin', function(){
//     return view('admins.dashboard');
// })->middleware(['auth','auth.admin']);

// Route::middleware('auth')->group(function (){
//     Route::get('/home', function () {
//         return view('home');
//     })->middleware('auth');

//     Route::middleware('auth.admin')->group(function (){
//         Route::get('/admins', function(){
//             return view('admins.dashboard');
//         });
//     });

// });

Route::get('/product/detai/{id}', [ProductController::class, 'chiTietSanPham'])->name('products.detai');
Route::get('/list-cart', [CartController::class, 'listCart'])->name('cart.list');
Route::post('/add-to-cart', [CartController::class, 'addCart'])->name('cart.add');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/list-product', [ProductController::class, 'listProduct'])->name('list.product');


// Route admin

Route::middleware(['auth', 'auth.admin'])->prefix('admins')
->as('admins.')
->group(function () {
    Route::get('/dashboard', function () {
        return view('admins.dashboard');
    })->name('dashboard');


    // danh mục
    Route::prefix('danhmucs')
        ->as('danhmucs.')
        ->group(function () {
            Route::get('/' , [DanhMucController::class, 'index'])->name('index');
            Route::get('/create' , [DanhMucController::class, 'create'])->name('create');
            Route::post('/store' , [DanhMucController::class, 'store'])->name('store');
            Route::get('/show/{id}' , [DanhMucController::class, 'show'])->name('show');
            Route::get('{id}/edit' , [DanhMucController::class, 'edit'])->name('edit');
            Route::put('{id}/update' , [DanhMucController::class, 'update'])->name('update');
            Route::delete('{id}/destroy' , [DanhMucController::class, 'destroy'])->name('destroy');
                
    });


    //sản phẩm
    Route::prefix('sanphams')
    ->as('sanphams.')
    ->group(function () {
        Route::get('/' , [SanPhamController::class, 'index'])->name('index');
        Route::get('/create' , [SanPhamController::class, 'create'])->name('create');
        Route::post('/store' , [SanPhamController::class, 'store'])->name('store');
        Route::get('/show/{id}' , [SanPhamController::class, 'show'])->name('show');
        Route::get('{id}/edit' , [SanPhamController::class, 'edit'])->name('edit');
        Route::put('{id}/update' , [SanPhamController::class, 'update'])->name('update');
        Route::delete('{id}/destroy' , [SanPhamController::class, 'destroy'])->name('destroy');
            
   });

    Route::prefix('donhangs')
    ->as('donhangs.')
    ->group(function () {
        Route::get('/' , [DonHangController::class, 'index'])->name('index');
        Route::get('/show/{id}' , [DonHangController::class, 'show'])->name('show');
        Route::put('{id}/update' , [DonHangController::class, 'update'])->name('update');
        Route::delete('{id}/destroy' , [DonHangController::class, 'destroy'])->name('destroy');
            
    });

    //Tài khoản
    Route::prefix('users')
    ->as('users.')
    ->group(function () {
        Route::get('/' , [TaiKhoanController::class, 'index'])->name('index');
        Route::get('/create' , [TaiKhoanController::class, 'create'])->name('create');
        Route::post('/store' , [TaiKhoanController::class, 'store'])->name('store');
        Route::get('/show/{id}' , [TaiKhoanController::class, 'show'])->name('show');
        Route::get('{id}/edit' , [TaiKhoanController::class, 'edit'])->name('edit');
        Route::put('{id}/update' , [TaiKhoanController::class, 'update'])->name('update');
        Route::delete('{id}/destroy' , [TaiKhoanController::class, 'destroy'])->name('destroy');
            
    });

});

Route::middleware('auth')->prefix('donhangs')
//  Route::prefix('donhangs')
 ->as('donhangs.')
 ->group(function () {
     Route::get('/' ,               [OrderController::class, 'index'])->name('index');
     Route::get('/create' ,         [OrderController::class, 'create'])->name('create');
     Route::post('/store' ,         [OrderController::class, 'store'])->name('store');
     Route::get('/show/{id}' ,      [OrderController::class, 'show'])->name('show');
     Route::put('{id}/update' ,     [OrderController::class, 'update'])->name('update');
         
});
