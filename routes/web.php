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
Auth::routes();
Route::resource('roles', 'RoleController');

Route::get('/', 'PostController@index')->name('home');

Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('posts', 'PostController');

  //Roles y Permisos
  Route::group(['prefix'=>'admin'],function ()
  {
      Route::group(['middleware' => ['permission:MenuRoles']], function() {
          //Route::get('/listar_roles', 'RoleController@listar_roles');
           Route::get('/listar_roles', 'AdminController@listar_roles');
          Route::get('/data_listar_roles', 'AdminController@data_listar_roles');
          Route::get('/roles/{id}/editar_roles_permisos', 'RoleController@editar_roles_permisos');
      });
  });


Route::post('/login', 'Auth\LoginController@login');
Route::get('/register/verify/{code}', 'Auth\LoginController@verify');
Route::post('/register', 'Auth\RegisterController@create')->name('create');
Route::post('/passReset', 'Auth\ResetPasswordController@resetPassword');
Route::get('/validator/{id}', 'Auth\RegisterController@validator')->name('validator');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/condTerminos', 'HomeController@condTerminos')->name('condTerminos');
Route::post('/passReset', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/passForgot', 'Auth\ForgotPasswordController@validateEmail')->name('passReset');
Route::post('/passUpdate', 'Auth\ForgotPasswordController@updatePass')->name('updatePass');
Route::get('/forgot/verify/{id}', 'Auth\ForgotPasswordController@validateTokenPassReset')->name('forgotPassW');
Route::get('/passModal', 'Auth\ForgotPasswordController@');

// controladores dash
Route::get('/dash','GraficController@index');
Route::get('/grafic','GraficController@graficas');

// tikes totales tabla
Route::get('/dash2','GraficController@tickett');
//  Tickets asignados
Route::get('/tks_asignados','GraficController@ticketa');
//  Tickets Atendidos
Route::get ('/tks_atendidos','GraficController@tickets_atendidos');
// Tickets estatus Solicitud de Toner
Route::get ('/tickets_sol_toner', 'Tks_DT_controlle@tickets_sol_toner');
// Tickets estatus en espera de Informacion
Route::get ('/tickets_espera_inf', 'Tks_DT_controlle@tickets_esp_info');
// ticket Estatus pendiente
Route::get ('/tickets_pendiente', 'Tks_DT_controlle@tickets_pendiente');




Route::get('/', function ()  {
    if (Auth::check()){
            if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('SuperAdmin')){
            return redirect('/admin');
            }
            else{
                return redirect('/dash');
                }

        }else{
    return redirect('/dash');
    }
    });

 //Usuarios
 //editar usuarios
    Route::group(['prefix' => 'users'], function() {
        Route::get('/profile', 'UserController@profile');
    Route::get('/index', 'UserController@index');
    Route::post('/updatePassword', 'UserController@updatePassword');
    Route::post('/validPassword', 'UserController@validPassword');
    Route::post('/validUser', 'Auth\RegisterController@validUser');
    Route::post('/validEmail', 'Auth\RegisterController@validEmail');
    Route::post('/editUser', 'UserController@editUser');
    });
 //Administrador
 Route::group(['middleware' => ['role:SuperAdmin']], function() {
  //editar usuarios
     Route::group(['prefix' => 'admin'], function() {
        Route::get('/', 'AdminController@dashboard');
      Route::get('/index', 'AdminController@index');
      Route::get('/listar_usuarios', 'AdminController@listar_usuarios');
     // Route::get('/listar_roles', 'AdminController@listar_roles');
      Route::get('/data_listar_usuarios', 'AdminController@data_listar_usuarios');
      Route::get('/data_listar_roles', 'AdminController@data_listar_roles');
      Route::get('/create', 'AdminController@create');
      Route::get('/edit', 'AdminController@edit');
      Route::post('/store', 'AdminController@store');
      Route::post('/update', 'AdminController@update');
     });
     Route::group(['prefix' => 'rol'], function() {

    });

 });
 Route::resource('files', 'FileController');
 //Route::get('/files/show', 'FileController@show');
/*Route::get('test', function() {
  dd(DB::connection()->getPdo());
});*/
Route::get('/block_screen', function () {
  return view('usuarios/block_screen');
});
Route::post('/block_screen', function () {
    return response()
    ->json(['status' => 'true']);
});
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
