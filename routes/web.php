<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PembayaranController;
use App\Models\Cart;
use Symfony\Component\Finder\Iterator\CustomFilterIterator;

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


Route::get('/migration', function ($id) {
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
});

Route::get('/', function () {
    return redirect()->route('homePageCustomer');
});

Route::post('checkout/{user_id}', [OrderController::class, 'store'])->name('order.checkout');
Route::get('pembayaran/{order_id}', [PembayaranController::class, 'show'])->name('pembayaran.show');

Route::get('checkout/pembayaran', [OrderController::class, 'payment']);
Route::get('pembayaran/orderterima/{order_id}', [OrderController::class, 'terima'])->name('order.terima');
Route::get('pembayaran/ordertolak/{order_id}', [OrderController::class, 'tolak'])->name('order.tolak');
Route::post('pembayaran/order/{order_id}', [PembayaranController::class, 'store']);


Route::get('order/my-orders', [OrderController::class, 'showMyOrders'])->name('myOrder.show');

Route::get('/login', function () {
    return view('loginPage.loginPage',
    ['tittle' => 'Login Page']); 
}) -> name('LoginPage') -> middleware('guest');

Route::get('/register',[RegisterController::class, 'index'])->name('RegisterPage')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout']) -> name('logout');

Route::post('/postlogin', [LoginController::class, 'login']) -> name('login');
Route::post('/postregister', [RegisterController::class, 'store']) -> name('register');

Route::middleware(['auth','cekStatus:admin'])->group(function () {
    Route::get('/homeAdmin', [DashboardController::class, 'index']) -> name('homePageAdmin');
    Route::resource('kategori', KategoriController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('user', UserController::class);
    Route::resource('order', OrderController::class);
    Route::resource('orderDetail', OrderDetailController::class);
    Route::get('/admin/profil', [UserController::class, 'profil'])->name('profiladmin');
    Route::put('/admin/profil/{id}', [UserController::class, 'updateprofil']);
    Route::get('/produk/cetak_pdf', [ProdukController::class, 'cetak_pdf'])->name('cetak_pdf');
    
    Route::resource('produk', ProdukController::class);
});

Route::get('/customer/produk/{keyword}',[CustomerPageController::class, 'produk'])->name('SC');
Route::get('/customer/produk/search', [CustomerPageController::class, 'index2'])->name('produk.search');
Route::get('/customer/supplier', [CustomerPageController::class, 'supplier']);
Route::get('/customer/detailproduk/{id}', [CustomerPageController::class, 'detail'])->name('produk.detail');
Route::get('/customer/about', [CustomerPageController::class, 'about'])->name('homepage.about');
Route::get('/homecust', [CustomerPageController::class, 'homePage'])->name('homePageCustomer');

Route::middleware(['auth','cekStatus:customer'])->group(function () {
    // Route::get('/homecust', function () {
    //     $all_cart = Cart::all()->where('user_id',Auth::user()->id);
    //     return view('customerpage.home') 
    //     ->with('all_cart', $all_cart);
    // })->name('homePageCustomer');


// Route::get('/customer/produk/{keyword}',[CustomerPageController::class, 'produk'])->name('LD');
// Route::get('/customer/produk/search', [CustomerPageController::class, 'index2'])->name('produk.search');
// Route::get('/customer/supplier', [CustomerPageController::class, 'supplier']);
Route::get('/customer/profil', [CustomerPageController::class, 'profil'])->name('profile');
Route::put('/customer/profil/{id}', [CustomerPageController::class, 'update']);
// Route::get('/customer/detailproduk/{id}', [CustomerPageController::class, 'detail'])->name('produk.detail');
// Route::get('/customer/about', function () {
//     $all_cart = Cart::all()->where('user_id',Auth::user()->id);
//     return view('customerpage.about') 
//     ->with('all_cart', $all_cart);
// });

// Cart
Route::get('/customer/cart', [CartController::class, 'index'])->name('cart.index');
Route::put('/customer/cart/{cart:id}',[CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::delete('/customer/cart/{cart:id}',[CartController::class, 'destroy'])->name('cart.delete');
});


Route::post('/customer/produkcart', [CartController::class, 'addToCart'])->name('cart.addToCart');