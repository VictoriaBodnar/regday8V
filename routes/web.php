<?php

use Illuminate\Support\Facades\Route;
use App\Models\Consumer;
use App\Models\Rem;
use Illuminate\Http\Request;
use App\Http\Requests;

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
    //return view('welcomeTrc');
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', 'HomeController@index');
Route::get('/catalog', [App\Http\Controllers\HomeController::class, 'catalog'])->name('catalog');
//Route::get('/catalog', 'HomeController@catalog');
Route::get('/changeTheme/{color}', [App\Http\Controllers\HomeController::class, 'changeTheme'])->name('changeTheme');
//Route::get('/changeTheme/{color}', 'App\Http\Controllers\HomeController@changeTheme');
Route::get('/instruction', [App\Http\Controllers\HomeController::class, 'instructionShow'])->name('instruction');
//Route::get('/instruction', 'App\Http\Controllers\HomeController@InstructionShow');
//Route::get('MVCscheme.docx', 'App\Http\Controllers\HomeController@InstructionShow');


  /**
   * Вывести панель с со списком потребителей
   */
  /*Route::get('/consumer_list', function () {

    $consumers = Consumer::orderBy('created_at', 'asc')->get();

    return view('consumers', [
      'consumers' => $consumers
    ]);
      //return view('consumers');
  });*/
  //Route::get('/consumer_list', 'ConsumerController@show')->middleware('auth');
  Route::get('/consumer_list', [App\Http\Controllers\ConsumerController::class, 'show'])->name('consumers');
  //Route::get('/consumer_list', 'ConsumerController@show');


  /**
   * Добавить нового потребителя
   */
  Route::post('/consumer_add', 'App\Http\Controllers\ConsumerController@store');
  
  /*Route::post('/consumer_add', function (Request $request) {
    $validator = Validator::make($request->all(), [
    'kod_consumer' => 'required|max:5',  
    'name_consumer' => 'required|max:255',
    'kod_rem' => 'required|max:3',
    'kod_otr' => 'required|max:3',
    'kod_podotr' => 'required|max:3',
    ]);

    if ($validator->fails()) {
      return redirect('/consumer_list')
        ->withInput()
        ->withErrors($validator);
    }

    $consumer = new Consumer;
    $consumer->kod_consumer = $request->kod_consumer;
    $consumer->name_consumer = $request->name_consumer;
    $consumer->kod_rem = $request->kod_rem;
    $consumer->kod_otr = $request->kod_otr;
    $consumer->kod_podotr = $request->kod_podotr;
    $consumer->save();

    return redirect('/consumer_list');
  });*/


  /**
   * Удалить потребителя
   */
  /*Route::delete('/consumer_del/{consumer}', function (Consumer $consumer) {
    $consumer->delete();

    return redirect('/consumer_list');
  });*/

  Route::delete('/consumer_del/{consumer}','App\Http\Controllers\ConsumerController@delete');
  //Route::get('/consumer_del/{consumer}','ConsumerController@delete');
  Route::get('/consumer_edit/{consumer}', 'App\Http\Controllers\ConsumerController@edit');
  Route::put('/consumer_edit/{consumer}','App\Http\Controllers\ConsumerController@update');
  //Route::put('/PATCH/consumer_edit/{consumer}','ConsumerController@update');
  

 
  

  /***  rems  **************************************************************************************************/
  //Route::get('/rems', [App\Http\Controllers\RemController::class, 'index'])->name('rems');
  Route::resource('rems', 'App\Http\Controllers\RemController');
  /*Один этот вызов создаёт множество маршрутов для обработки различных действий для ресурса. 
 
/*Тип     URI                     Действие  Имя маршрута
  GET     /rems                   index     rems.index
  GET     /rems/create            create    rems.create
  POST    /rems                   store     rems.store
  GET     /rems/{rem}             show      rems.show
  GET     /rems/{rem}/edit        edit      rems.edit
  PUT     /PATCH /rems/{rem}      update    rems.update
  DELETE  /rems/{rem}             destroy   rems.destroy*/

Route::resource('otrs', 'App\Http\Controllers\OtrController');
Route::resource('pasps', 'App\Http\Controllers\PaspController');
Route::resource('types', 'App\Http\Controllers\TypeController');
  

  /*Route::get('/editPasps', function () {
    return view('editPasps');
});*/

Route::get('import-export-csv-excel',array('as'=>'excel.import','uses'=>'App\Http\Controllers\FileController@importExportExcelORCSV'));
Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'App\Http\Controllers\FileController@importFileIntoDB'));
//Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'App\Http\Controllers\GrafController@fileImport'));

Route::get('download-excel-file/{type}', array('as'=>'excel-file','uses'=>'App\Http\Controllers\FileController@downloadExcelFile'));
//Route::get('/graf/{graf?}/{id?}', 'GrafController@show');
//Route::post('/graf/{graf?}/{id?}','GrafController@show');
//Route::match(['get', 'post'], '/graf/{graf?}/{id?}', 'GrafController@show');


Route::match(['get', 'post'], '/graf/{date?}/{type?}/{id?}', 'App\Http\Controllers\GrafController@show');

Route::delete('/graf_del/{graf}','App\Http\Controllers\GrafController@delete');
Route::get('/graf_edit/{graf}', 'App\Http\Controllers\GrafController@edit'); 
Route::put('/graf_edit/{graf}','App\Http\Controllers\GrafController@update');
Route::get('/graf_add', 'App\Http\Controllers\GrafController@add');
Route::post('/graf_add', 'App\Http\Controllers\GrafController@store');
Route::match(['get', 'post'], '/maket', 'App\Http\Controllers\MaketController@maketMaker');

Route::get('/trespo',function(){return view('testResposive');});

Route::get('password/reset/{token?}', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');
//Route::post('password/reset/{token?}', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::delete('/graf_del_block/{graf?}','App\Http\Controllers\GrafController@deleteBlock');
Route::get('/graf_del_block', 'App\Http\Controllers\GrafController@setDeleteBlock'); 


//Password Reset Routes...
/*Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');*/