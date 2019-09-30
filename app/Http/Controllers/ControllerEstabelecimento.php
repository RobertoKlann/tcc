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
 * @since   26/08/2019
 */
class ControllerEstabelecimento extends Controller {

    /**
     * SQL padrão da Consulta de Estabelecimento.
     * 
     * @return Object
     */
    public function getSqlConsultaPadrao() {
        $bEst = DB::select('SELECT * 
                              FROM tbestabelecimento 
                              JOIN tbcategoriaestabelecimento 
                             USING (ctecodigo)
                          ORDER BY estcodigo ASC
        ');
        
        return view('ViewEstabelecimento')->with('estabelecimento', $bEst);
    }

    public function insereEstabelecimento() {
        $aCampos = Request::all();
        DB::insert("INSERT INTO tbestabelecimento
                         VALUES({$aCampos['codigo']}, '{$aCampos['nomerazao']}', '{$aCampos['endereco']}', 
                         '{$aCampos['horario']}', {$aCampos['catcodigo']}
        )");
        
        return redirect()->action('ControllerEstabelecimento@getSqlConsultaPadrao');
    }

    public function deleteEstabelecimento($iCodigo) {
        DB::table('tbestabelecimento')->where('estcodigo', '=', $iCodigo)->delete();

        return redirect()->action('ControllerEstabelecimento@getSqlConsultaPadrao');
    }

    public function updateEstabelecimento() {
        $aCampos = Request::all();
        DB::table('tbestabelecimento')->where('estcodigo', '=', "{$aCampos['codigo']}")->update(
            [
                'estnomerazao' => "{$aCampos['nomerazao']}",
                'estendereco'  => "{$aCampos['endereco']}",
                'esthorario'   => "{$aCampos['horario']}"
            ]
        );

        return redirect()->action('ControllerEstabelecimento@getSqlConsultaPadrao');
    }

    public function getEstabelecimento($iCodigo) {
        $oCat = DB::select("SELECT *
                              FROM tbestabelecimento
                              JOIN tbcategoriaestabelecimento
                             USING (ctecodigo)
                             WHERE estcodigo = '{$iCodigo}'");
        
        return Response::json($oCat);
    }

    public function getMaxCodigoEstabelecimento() {
        $maxCodigo = DB::select('SELECT MAX(estcodigo) maxcodigo FROM tbestabelecimento');
        
        return Response::json($maxCodigo);
    }

    public function getAllCategoriasEst() {
        $aCategorias = DB::select('SELECT * FROM tbcategoriaestabelecimento');
        
        return Response::json($aCategorias);
    }

}