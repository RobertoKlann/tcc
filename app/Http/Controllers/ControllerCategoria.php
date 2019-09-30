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
class ControllerCategoria extends Controller {

    /**
     * SQL padrão da Consulta de Categoria.
     * 
     * @return Object
     */
    public function getSqlConsultaPadrao() {
        $bCat = DB::select('SELECT * 
                              FROM tbcategoria
                          ORDER BY ctgcodigo ASC
        ');
        
        return view('ViewCategoria')->with('categorias', $bCat);
    }

    public function insere() {
        $aCampos = Request::all();
        DB::insert("INSERT INTO tbcategoria(ctgcodigo, ctgdescricao) 
                         VALUES({$aCampos['codigo']}, '{$aCampos['descricao']}')");
        
        return redirect()->action('ControllerCategoria@getSqlConsultaPadrao');
    }

    public function deleteCategoria($iCodigo) {
        DB::table('tbcategoria')->where('ctgcodigo', '=', $iCodigo)->delete();

        return redirect()->action('ControllerCategoria@getSqlConsultaPadrao');
    }

    public function updateCategoria() {
        $aCampos = Request::all();
        DB::table('tbcategoria')->where('ctgcodigo', '=', "{$aCampos['codigo']}")->update(['ctgdescricao' => "{$aCampos['descricao']}"]);

        return redirect()->action('ControllerCategoria@getSqlConsultaPadrao');
    }

    public function getCategoria($iCodigo) {
        $oCat = DB::select("SELECT * FROM tbcategoria WHERE ctgcodigo = '{$iCodigo}'");
        
        return Response::json($oCat);
    }

    public function getMaxCodigoCategoria() {
        $maxCodigo = DB::select('SELECT MAX(ctgcodigo) maxcodigo FROM tbcategoria');
        
        return Response::json($maxCodigo);
    }
    
}