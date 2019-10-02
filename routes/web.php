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

//Consultas
Route::get('/ViewInicial'                             , 'ControllerPrincipal@getViewInicial');
Route::get('/ViewInicial/ViewEstabelecimento'         , 'ControllerEstabelecimento@getSqlConsultaPadrao');
Route::get('/ViewInicial/ViewCategoriaEstabelecimento', 'ControllerCategoriaEstabelecimento@getSqlConsultaPadrao');
Route::get('/ViewInicial/ViewCategoria'               , 'ControllerCategoria@getSqlConsultaPadrao');
Route::get('/ViewInicial/ViewSubCategoria'            , 'ControllerSubCategoria@getSqlConsultaPadrao');
Route::get('/ViewInicial/ViewProduto'                 , 'ControllerProduto@getSqlConsultaPadrao');
Route::get('/ViewInicial/ViewMesa'                    , 'ControllerMesa@getSqlConsultaPadrao');
Route::get('/ViewInicial/ViewUsuario'                 , 'ControllerUsuario@getSqlConsultaPadrao');

//Insert
Route::get('/ViewInicial/insere'               , 'ControllerCategoriaEstabelecimento@insere');
Route::get('/ViewInicial/insereCategoria'      , 'ControllerCategoria@insere');
Route::get('/ViewInicial/insereSubCategoria'   , 'ControllerSubCategoria@insereSubCategoria');
Route::get('/ViewInicial/insereMesa'           , 'ControllerMesa@insereMesa');
Route::get('/ViewInicial/insereEstabelecimento', 'ControllerEstabelecimento@insereEstabelecimento');
Route::get('/ViewInicial/insereProduto'        , 'ControllerProduto@insereProduto');

//Update
Route::get('/ViewInicial/update'               , 'ControllerCategoriaEstabelecimento@update');
Route::get('/ViewInicial/updateCategoria'      , 'ControllerCategoria@updateCategoria');
Route::get('/ViewInicial/updateSubCategoria'   , 'ControllerSubCategoria@updateSubCategoria');
Route::get('/ViewInicial/updateMesa'           , 'ControllerMesa@updateMesa');
Route::get('/ViewInicial/updateEstabelecimento', 'ControllerEstabelecimento@updateEstabelecimento');
Route::get('/ViewInicial/updateProduto'        , 'ControllerProduto@updateProduto');

//Delete
Route::get('/ViewInicial/delete/{ctecodigo}'               , 'ControllerCategoriaEstabelecimento@delete');
Route::get('/ViewInicial/deleteCategoria/{ctgcodigo}'      , 'ControllerCategoria@deleteCategoria');
Route::get('/ViewInicial/deleteSubCategoria/{sbccodigo}'   , 'ControllerSubCategoria@deleteSubCategoria');
Route::get('/ViewInicial/deleteMesa/{msacodigo}'           , 'ControllerMesa@deleteMesa');
Route::get('/ViewInicial/deleteEstabelecimento/{estcodigo}', 'ControllerEstabelecimento@deleteEstabelecimento');
Route::get('/ViewInicial/deleteProduto/{prdcodigo}'        , 'ControllerProduto@deleteProduto');

//Ajax
Route::get('/ViewInicial/getProximoCodigo'               , 'ControllerCategoriaEstabelecimento@getMaxCodigo');
Route::get('/ViewInicial/getProximoCodigoCategoria'      , 'ControllerCategoria@getMaxCodigoCategoria');
Route::get('/ViewInicial/getProximoCodigoSubCategoria'   , 'ControllerSubCategoria@getMaxCodigoSubCategoria');
Route::get('/ViewInicial/getProximoCodigoMesa'           , 'ControllerMesa@getMaxCodigoMesa');
Route::get('/ViewInicial/getProximoCodigoEstabelecimento', 'ControllerEstabelecimento@getMaxCodigoEstabelecimento');
Route::get('/ViewInicial/getProximoCodigoProduto'        , 'ControllerProduto@getMaxCodigoProduto');

Route::get('/ViewInicial/getAllCategorias'          , 'ControllerSubCategoria@getAllCategorias');
Route::get('/ViewInicial/getAllCategoriasEst'       , 'ControllerEstabelecimento@getAllCategoriasEst');
Route::get('/ViewInicial/getAllCategoriasProduto'   , 'ControllerProduto@getAllCategoriasProduto');
Route::get('/ViewInicial/getAllSubCategoriasProduto/{sbccodigo}', 'ControllerProduto@getAllSubCategoriasProduto');

Route::get('/ViewInicial/getCategoriaEstabelecimento/{ctecodigo}', 'ControllerCategoriaEstabelecimento@getCategoriaEstabelecimento');
Route::get('/ViewInicial/getCategoria/{ctecodigo}'               , 'ControllerCategoria@getCategoria');
Route::get('/ViewInicial/getSubCategoria/{sbccodigo}'            , 'ControllerSubCategoria@getSubCategoria');
Route::get('/ViewInicial/getMesa/{msacodigo}'                    , 'ControllerMesa@getMesa');
Route::get('/ViewInicial/getEstabelecimento/{estcodigo}'         , 'ControllerEstabelecimento@getEstabelecimento');
Route::get('/ViewInicial/getProduto/{prdcodigo}'                 , 'ControllerProduto@getProduto');
