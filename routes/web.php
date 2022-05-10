<?php

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

Route::get('/', '\App\Http\Controllers\Main@index')->name('index');

//
//      LOGIN do Usuário
//
Route::get('/login', '\App\Http\Controllers\Main@login')->name('login');
Route::post('/login_submit', '\App\Http\Controllers\Main@login_submit') ->name('login_submit');

//
//      Temporária para obtenção de um usário para Login
//

// Route::get('/temp', '\App\Http\Controllers\Main@temp')->name('temp');

//
//         HOME (Entrada da Aplicação)
//

Route::get('/home', '\App\Http\Controllers\Main@home')->name('home');

//
//      Logout
//

Route::get('/logout', '\App\Http\Controllers\Main@logout')->name('logout');


//
//      EDITAR
//

Route::get('/edit/{id_usuario}','\App\Http\Controllers\Main@edit')->name('edit');
Route::get('/final/{hash}','\App\Http\Controllers\Main@final')->name('final');

//
//      LISTAR Ficheiros
//
Route::get('/lista_ficheiros','\App\Http\Controllers\Main@lista_ficheiros')->name('lista_ficheiros');

//
//      UPLOAD Ficheiro
//

Route::post('/upload', '\App\Http\Controllers\Main@upload') ->name('upload');

//
//      DOWLOAD Ficheiro
//

Route::get('/dowload/{file}','\App\Http\Controllers\Main@dowload')->name('dowload');

//
//      CHAMANDO CONSTANTES
//

// Route::get('/aaa', function(){

//     echo config('constantes.VERSAO');
//     echo '<br>';
//     echo config('constantes.MYSQL_HOST');
// });
