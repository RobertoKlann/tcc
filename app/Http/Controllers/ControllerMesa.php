<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Request;

/**
 * Controllador da Mesa.
 * 
 * @package Controller
 * @author  Roberto Klann
 * @since   26/08/2019
 */
class ControllerMesa extends Controller {

    /**
     * SQL padrão da Consulta da Mesa.
     * 
     * @return Object
     */
    public function getSqlConsultaPadrao() {
        $bMesa = DB::select('SELECT * 
                                  FROM tbmesa
                              ORDER BY msacodigo ASC
        ');
        
        return view('ViewMesa')->with('mesas', $bMesa);
    }

    public function insereMesa() {
        $aCampos = Request::all();
        DB::insert("INSERT INTO tbmesa(msacodigo, msaqtdlugares, msasituacao) 
                         VALUES({$aCampos['codigo']}, '{$aCampos['qtdlugares']}', {$aCampos['situacao']})");
        
        return redirect()->action('ControllerMesa@getSqlConsultaPadrao');
    }

    public function deleteMesa($iCodigo) {
        DB::table('tbmesa')->where('msacodigo', '=', $iCodigo)->delete();

        return redirect()->action('ControllerMesa@getSqlConsultaPadrao');
    }

    public function updateMesa() {
        $aCampos = Request::all();
        DB::table('tbmesa')->where('msacodigo', '=', "{$aCampos['codigo']}")->update(['msaqtdlugares' => "{$aCampos['qtdlugares']}", 'msasituacao' => "{$aCampos['situacao']}"]);

        return redirect()->action('ControllerMesa@getSqlConsultaPadrao');
    }

    public function getMesa($iCodigo) {
        $oCat = DB::select("SELECT *
                              FROM tbmesa
                             WHERE msacodigo = '{$iCodigo}'");
        
        return Response::json($oCat);
    }

    public function getMaxCodigoMesa() {
        $maxCodigo = DB::select('SELECT MAX(msacodigo) maxcodigo FROM tbmesa');
        
        return Response::json($maxCodigo);
    }

}