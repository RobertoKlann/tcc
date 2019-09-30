<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Request;

/**
 * Controllador das Categorias de produto.
 * 
 * @package Controller
 * @author  Roberto Klann
 * @since   26/08/2019
 */
class ControllerSubCategoria extends Controller {

    /**
     * SQL padrão da Consulta de SubCategoria.
     * 
     * @return Object
     */
    public function getSqlConsultaPadrao() {
        $bSubCat = DB::select('SELECT * 
                              FROM tbsubcategoria
                              JOIN tbcategoria
                             USING (ctgcodigo)
                          ORDER BY sbccodigo ASC
        ');
        
        return view('ViewSubCategoria')->with('subcategorias', $bSubCat);
    }

    public function insereSubCategoria() {
        $aCampos = Request::all();
        DB::insert("INSERT INTO tbsubcategoria(sbccodigo, sbcdescricao, ctgcodigo) 
                         VALUES({$aCampos['codigo']}, '{$aCampos['descricao']}', {$aCampos['catcodigo']})");
        
        return redirect()->action('ControllerSubCategoria@getSqlConsultaPadrao');
    }

    public function deleteSubCategoria($iCodigo) {
        DB::table('tbsubcategoria')->where('sbccodigo', '=', $iCodigo)->delete();

        return redirect()->action('ControllerSubCategoria@getSqlConsultaPadrao');
    }

    public function updateSubCategoria() {
        $aCampos = Request::all();
        DB::table('tbsubcategoria')->where('sbccodigo', '=', "{$aCampos['codigo']}")->update(['sbcdescricao' => "{$aCampos['descricao']}"]);

        return redirect()->action('ControllerSubCategoria@getSqlConsultaPadrao');
    }

    public function getSubCategoria($iCodigo) {
        $oCat = DB::select("SELECT *
                              FROM tbsubcategoria
                              JOIN tbcategoria
                             USING (ctgcodigo)
                             WHERE sbccodigo = '{$iCodigo}'");
        
        return Response::json($oCat);
    }

    public function getMaxCodigoSubCategoria() {
        $maxCodigo = DB::select('SELECT MAX(sbccodigo) maxcodigo FROM tbsubcategoria');
        
        return Response::json($maxCodigo);
    }

    public function getAllCategorias() {
        $aCategorias = DB::select('SELECT * FROM tbcategoria');
        
        return Response::json($aCategorias);
    }
    
}