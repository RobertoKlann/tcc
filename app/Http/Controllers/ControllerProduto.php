<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Request;

/**
 * Controllador de produto.
 * 
 * @package Controller
 * @author  Roberto Klann
 * @since   26/08/2019
 */
class ControllerProduto extends Controller {

    /**
     * SQL padrão da Consulta de Produto.
     * 
     * @return Object
     */
    public function getSqlConsultaPadrao() {
        $bProduto = DB::select('SELECT * 
                                  FROM tbproduto
                                  JOIN tbsubcategoria
                                 USING (sbccodigo)
                                  JOIN tbcategoria
                                 USING (ctgcodigo)                                 
                              ORDER BY prdcodigo ASC
        ');
        
        return view('ViewProduto')->with('produtos', $bProduto);
    }

    public function insereProduto() {
        $aCampos = Request::all();
        DB::insert("INSERT INTO tbproduto
                         VALUES({$aCampos['codigo']}, '{$aCampos['descricao']}', 
                         '{$aCampos['preco']}', {$aCampos['subcatcodigo']}
        )");
        
        return redirect()->action('ControllerProduto@getSqlConsultaPadrao');
    }

    public function deleteProduto($iCodigo) {
        DB::table('tbproduto')->where('prdcodigo', '=', $iCodigo)->delete();

        return redirect()->action('ControllerProduto@getSqlConsultaPadrao');
    }

    public function updateProduto() {
        $aCampos = Request::all();
        DB::table('tbproduto')->where('prdcodigo', '=', "{$aCampos['codigo']}")->update(
            [
                'prddescricao' => "{$aCampos['descricao']}",
                'prdpreco'  => "{$aCampos['preco']}"
            ]
        );

        return redirect()->action('ControllerProduto@getSqlConsultaPadrao');
    }

    public function getProduto($iCodigo) {
        $oCat = DB::select("SELECT *
                              FROM tbproduto
                              JOIN tbsubcategoria
                             USING (sbccodigo)
                              JOIN tbcategoria
                             USING (ctgcodigo)
                             WHERE prdcodigo = '{$iCodigo}'");
        
        return Response::json($oCat);
    }

    public function getMaxCodigoProduto() {
        $maxCodigo = DB::select('SELECT MAX(prdcodigo) maxcodigo FROM tbproduto');
        
        return Response::json($maxCodigo);
    }

    public function getAllSubCategoriasProduto($iCodigo) {
        $aCategorias = DB::select("SELECT *
                                     FROM tbsubcategoria
                                    WHERE ctgcodigo = '{$iCodigo}'"
        );
        
        return Response::json($aCategorias);
    }

    public function getAllCategoriasProduto() {
        $aCategorias = DB::select("SELECT * FROM tbcategoria");
        
        return Response::json($aCategorias);
    }
    
}