<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Table1Controller;
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
Route::get('/', [Table1Controller::class, 'index']);
Route::post('/add-data', [Table1Controller::class, 'create']);
Route::post('/shift-data1', [Table1Controller::class, 'action1']);
Route::post('/shift-data2', [Table1Controller::class, 'action2']);

// Route::get('/', function () {
//     return view('welcome');
// });

//
// {  this.state.items.map((item, key) => {
//
//   <li key={key.item}>Hello, {d.item}</li>
//
// })}
