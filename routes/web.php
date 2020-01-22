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
    return view('welcome');
});

Route::get('/Coo', function () {
    return view('coordinador');
});

Route::get('/Beneficiarios','PreguntasController@beneficiarios')->name('beneficiarios');
Route::get('/Beneficiario','PreguntasController@beneficiarios_alert')->name('beneficiarios_alert');
Route::get('/Beneficiario_error','PreguntasController@beneficiarios_error')->name('beneficiarios_error');

Route::get('/test', function () {
    return view('test');
});

Route::get('/Docentes_Mod', function () {
    return view('Docentes.registrar');
});

Route::get('/Admin/OPS', function () {
    return view('Administracion.Operaciones');
});

Auth::routes();

// Administration  Routes
Route::post('/create_survey','AdminController@create_survey')->name('create_survey');
Route::post('/create_line','AdminController@create_line')->name('create_line');
Route::post('/create_ticket','AdminController@create_ticket')->name('create_ticket');
Route::get('/Admin', 'AdminController@index')->name('admin');
Route::get('/Resultados_Linea/{id}','AdminController@General_Results')->name('general_results');

Route::get('/Listado/{id}', 'AdminController@listado')->name('listado');
Route::get('/Lineas','AdminController@show_lines')->name('lines');
Route::get('/Operaciones/{id}', 'AdminController@operaciones')->name('ops');
Route::post('/destroy','AdminController@destroy')->name('delete');
Route::post('/modify_survey/{id}','AdminController@modify_survey')->name('modify_survey');
Route::get('/Preguntas/{id}', 'AdminController@preguntas')->name('preguntas');
Route::get('/Resultados/{id}', 'AdminController@resultados')->name('resultados');
Route::post('/Add_Question','AdminController@add_question')->name('add_question');
Route::post('/Add_Topic','AdminController@add_topic')->name('add_topic');
Route::post('/Add_Answers','AdminController@add_answers')->name('add_answers');
Route::post('/Add_Sub/{id}','AdminController@subquestions')->name('add_subs');
Route::post('/Modify_Answers','AdminController@modify_answers')->name('modify_answers');
Route::get('/Operaciones_Linea/{id}','AdminController@ops_line')->name('operaciones_linea');
Route::post('/Destroy_Question/{id}','AdminController@destroy_question')->name('destroy_question');
Route::post('/Destroy_Topic/{id}','AdminController@destroy_topic')->name('destroy_topic');
// Students Rooutes
Route::get('/encuesta/{id}', 'PreguntasController@index')->name('encuesta');
Route::post('submit/{id}', 'PreguntasController@delete')->name('save_ans');
Route::post('/next','PreguntasController@next')->name('next');
Route::get('next_question/{id}','PreguntasController@next_question')->name('next_question');
Route::get('/show-question', 'PreguntasController@show_question')->name('show-next');
Route::get('/home', 'HomeController@index')->name('HOME');
Route::get('/Docentes', 'DocentesController@index')->name('docentes');




