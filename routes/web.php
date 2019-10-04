<?php

/**
 * Rota de todas as rotinas do sitema.
 *
 * @package Routes
 * @author  Roberto Oswaldo Klann
 * @since   23/08/2019
 */

Route::get('/', function() {
    return redirect('auth/login');
});

/*
 | Auth
 |
 */
Route::group([
    'namespace' => 'Auth',
    'prefix'    => 'auth'
], function($router) {
    Route::get('login' , 'LoginController@index')->name('auth.index');
    Route::post('login', 'LoginController@login')->name('auth.login');
    Route::get('logout', 'LoginController@logout')->name('auth.logout');
});

Route::group([
    'namespace'  => 'BobWaiter',
    'prefix'     => 'bobWaiter',
    'middleware' => 'auth'
], function($router) {
    Route::get('{route}', 'HomeController@index')->where('route', 'index|home');

    //Consultas
    Route::get('/home'                     , 'ControllerPrincipal@index')->name('index');
    Route::get('/estabelecimento'          , 'ControllerEstabelecimento@show')->name('estabelecimento.index');
    Route::get('/estabelecimento/categoria', 'ControllerCategoriaEstabelecimento@show')->name('estabelecimento.categoria.index');
    Route::get('/categoria'                , 'ControllerCategoria@show')->name('categoria.index');
    Route::get('/produto'                  , 'ControllerProduto@show')->name('produto.index');
    Route::get('/mesa'                     , 'ControllerMesa@show')->name('mesa.index');
    Route::get('/usuario'                  , 'ControllerUsuario@show')->name('usuario.index');

    //ViewManutencao
    Route::get('/estabelecimento/categoria/create', 'ControllerCategoriaEstabelecimento@create');
    Route::get('/estabelecimento/create'          , 'ControllerEstabelecimento@create');
    Route::get('/categoria/create'                , 'ControllerCategoria@create');
    Route::get('/produto/create'                  , 'ControllerProduto@create');
    Route::get('/mesa/create'                     , 'ControllerMesa@create');
    Route::get('/usuario/create'                  , 'ControllerUsuario@create');

    //Insert
    Route::post('/estabelecimento/categoria/store', 'ControllerCategoriaEstabelecimento@store');
    Route::post('/categoria/store'                , 'ControllerCategoria@store');
    Route::post('/mesa/store'                    , 'ControllerMesa@store');
    Route::post('/estabelecimento/store '         , 'ControllerEstabelecimento@store');
    Route::post('/produto/store'                  , 'ControllerProduto@store');
    Route::post('/usuario/store'                  , 'ControllerUsuario@store');

    //Edit
    Route::get('/estabelecimento/categoria/edit/{ctecodigo}', 'ControllerCategoriaEstabelecimento@edit');
    Route::get('/estabelecimento/edit/{estcodigo}'          , 'ControllerEstabelecimento@edit');
    Route::get('/categoria/edit/{ctecodigo}'                , 'ControllerCategoria@edit');
    Route::get('/produto/edit/{procodigo}'                  , 'ControllerProduto@edit');
    Route::get('/mesa/edit/{msacodigo}'                     , 'ControllerMesa@edit');
    Route::get('/usuario/edit/{usucodigo}'                  , 'ControllerUsuario@edit');

    //Update
    Route::post('/estabelecimento/categoria/update', 'ControllerCategoriaEstabelecimento@update');
    Route::post('/categoria/update'                 , 'ControllerCategoria@update');
    Route::post('/subcategoria/update'              , 'ControllerSubCategoria@update');
    Route::post('/mesa/update'                      , 'ControllerMesa@update');
    Route::post('/estabelecimento/update'           , 'ControllerEstabelecimento@update');
    Route::post('/produto/update'                   , 'ControllerProduto@update');
    Route::post('/usuario/update'                   , 'ControllerUsuario@update');

    //Delete
    Route::delete('/estabelecimento/categoria/destroy/{ctecodigo}', 'ControllerCategoriaEstabelecimento@destroy');
    Route::delete('/categoria/destroy/{ctgcodigo}'                , 'ControllerCategoria@destroy');
    Route::delete('/mesa/destroy/{msacodigo}'                     , 'ControllerMesa@destroy');
    Route::delete('/estabelecimento/destroy/{estcodigo}'          , 'ControllerEstabelecimento@destroy');
    Route::delete('/produto/destroy/{prdcodigo}'                  , 'ControllerProduto@destroy');
    Route::delete('/usuario/destroy/{usucodigo}'                  , 'ControllerUsuario@destroy');

    //Ajax
    Route::get('getProximoCodigo'               , 'ControllerCategoriaEstabelecimento@getMaxCodigo');
    Route::get('getProximoCodigoCategoria'      , 'ControllerCategoria@getMaxCodigoCategoria');
    Route::get('getProximoCodigoMesa'           , 'ControllerMesa@getMaxCodigoMesa');
    Route::get('getProximoCodigoEstabelecimento', 'ControllerEstabelecimento@getMaxCodigoEstabelecimento');
    Route::get('getProximoCodigoProduto'        , 'ControllerProduto@getMaxCodigoProduto');
    Route::get('getProximoCodigoUsuario'        , 'ControllerUsuario@getMaxCodigoUsuario');

    Route::get('getAllCategorias'       , 'ControllerSubCategoria@getAllCategorias');
    Route::get('getAllCategoriasEst'    , 'ControllerEstabelecimento@getAllCategoriasEst');
    Route::get('getAllCategoriasProduto', 'ControllerProduto@getAllCategoriasProduto');

    Route::get('/estabelecimento/categoria/getCategoriaEstabelecimento/{ctecodigo}', 'ControllerCategoriaEstabelecimento@getCategoriaEstabelecimento');
    Route::get('/categoria/getCategoria/{ctecodigo}'                               , 'ControllerCategoria@getCategoria');
    Route::get('/mesa/getMesa/{msacodigo}'                                         , 'ControllerMesa@getMesa');
    Route::get('/estabelecimento/getEstabelecimento/{estcodigo}'                   , 'ControllerEstabelecimento@getEstabelecimento');
    Route::get('/produto/getProduto/{prdcodigo}'                                   , 'ControllerProduto@getProduto');
    Route::get('/usuario/getUsuario/{usucodigo}'                                   , 'ControllerUsuario@getUsuario');
});