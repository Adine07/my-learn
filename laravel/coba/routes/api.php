<?php

use App\Models\Ntahini;
use App\Models\Ntahitu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Contoh Cache
Route::get('/orders', function(){

    $keyCache = 'order_summary';
    // $orders = Cache::get($keyCache);
    // if ($orders) {
    //     return $orders;
    // }

    // $orders = DB::table('orders')->select([
    //     'product_code',
    //     DB::raw('sum(qty) as total_qty'),
    //     DB::raw('sum(price) as total_price')
    // ])->groupBy('product_code')->get();

    // Cache::put($keyCache, $orders, 60); //dalam detik

    // Bisa di persingkat
    $orders = Cache::remember($keyCache, 60, function(){
        return DB::table('orders')->select([
            'product_code',
            DB::raw('sum(qty) as total_qty'),
            DB::raw('sum(price) as total_price')
        ])->groupBy('product_code')->get();
    });

    return $orders;
});

// Contoh Database Indexing
// Pakai Index
Route::get('/ntahini', function(){
    // $data[] = Ntahini::where('city_id', 1)->get();
    // $data[] = Ntahini::where('city_id', 2)->get();
    // $data[] = Ntahini::where('city_id', 3)->get();

    $data = Ntahini::where('city_id', '=', 9999)->get();
    return $data;
});

// ga pake index
Route::get('/ntahitu', function(){
    // $data[] = Ntahitu::where('city_id', 1)->get();
    // $data[] = Ntahitu::where('city_id', 2)->get();
    // $data[] = Ntahitu::where('city_id', 3)->get();

    $data = Ntahitu::where('city_id', 9999)->get();
    return $data;
});
