<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

// // string 
// Route::get('/me', function() {
//     return 'nukhi';
// });

// // array
// Route::get('/me', function () {
//     return ['Nukhi','Fadillah','12 rpl 2'];
// });

// //routr array -> json
// Route::get('/me', function () {
//     return response()->json(
//         [
//         'Nama'=>'Nukhi Fadillah',
//         'Kela'=> 'XII RPL 2'
//         ]
//     );
// });

// Route::get('/me', function () {
//     return redirect('/');
// });

Route::get('/me', [AuthController::class, 'me']);