<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Request;

/**
 * Controllador das Categorias de Estabelecimento.
 * 
 * @package Controller
 * @author  Roberto Klann
 * @since   24/08/2019
 */
class ControllerCategoriaEstabelecimento extends Controller {

    /**
     * SQL padrão da Consulta de Categorias de Estabelecimento.
     * 
     * @return Object
     */
    public function getSqlConsultaPadrao() {
        $bCatEst = DB::select('SELECT * FROM tbcategoriaestabelecimento ORDER BY ctecodigo ASC');
        
        return view('ViewCategoriaEstabelecimento')->with('catest', $bCatEst);
    }

    public function insere() {
        $aCampos = Request::all();
        DB::insert("INSERT INTO tbcategoriaestabelecimento(ctecodigo, ctedescricao) 
                         VALUES({$aCampos['codigo']}, '{$aCampos['descricao']}')");
        
        return redirect()->action('ControllerCategoriaEstabelecimento@getSqlConsultaPadrao');
    }

    public function delete($iCodigo) {
        DB::table('tbcategoriaestabelecimento')->where('ctecodigo', '=', $iCodigo)->delete();

        return redirect()->action('ControllerCategoriaEstabelecimento@getSqlConsultaPadrao');
    }

    public function update() {
        $aCampos = Request::all();
        DB::table('tbcategoriaestabelecimento')->where('ctecodigo', '=', "{$aCampos['codigo']}")->update(['ctedescricao' => "{$aCampos['descricao']}"]);

        return redirect()->action('ControllerCategoriaEstabelecimento@getSqlConsultaPadrao');
    }

    public function getCategoriaEstabelecimento($iCodigo) {
        $oCat = DB::select("SELECT * FROM tbcategoriaestabelecimento WHERE ctecodigo = '{$iCodigo}'");
        
        return Response::json($oCat);
    }

    public function getMaxCodigo() {
        $maxCodigo = DB::select('SELECT MAX(ctecodigo) maxcodigo FROM tbcategoriaestabelecimento');
        
        return Response::json($maxCodigo);
    }

}