<?php

namespace App\Http\Controllers\BobWaiter;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Request;

/**
 * Controllador da Mesa.
 *
 * @package Controller
 * @author  Roberto Klann
 * @since   26/08/2019
 */
class ControllerMesa extends Controller {

    public function create() {
        return view('bobWaiter/ViewIncluirMesa');
    }

    public function edit($iCodigo) {
        $oMesa = $this->getMesa($iCodigo);

        return view('bobWaiter/ViewAlterarMesa')->with('mesa', $oMesa);
    }

    /**
     * SQL padrão da Consulta da Mesa.
     *
     * @return Object
     */
    public function show($codigo) {
        if(!is_numeric($codigo)) {
            return view('bobWaiter/ViewIncluirMesa');
        }
        
        $bMesa = DB::select('SELECT *
                               FROM tbmesa
                              WHERE TRUE
                                AND estcodigo = ' . $codigo . '
                           ORDER BY msacodigo ASC
        ');

        return view('bobWaiter/ViewMesa')->with('mesas', $bMesa);
    }

    public function store() {
        $aCampos = Request::all();
        DB::insert("INSERT INTO tbmesa(msacodigo, msaqtdlugares, msasituacao, estcodigo)
                         VALUES({$aCampos['codigo']}, '{$aCampos['qtdlugares']}',
                         {$aCampos['situacao']}, {$aCampos['estcodigo']})");

        return $this->show($aCampos['estabelecimento']);
    }

    public function destroy($iCodigo) {
        try {
            DB::table('tbmesa')->where('msacodigo', '=', $iCodigo)->delete();
        } catch(RuntimeException $e) {
            return response()->json(['success' => $e->getMessage()]);
        }

        return response()->json(['success' => 'true']);
    }

    public function update() {
        $aCampos = Request::all();
        DB::table('tbmesa')->where('msacodigo', '=', "{$aCampos['codigo']}")->update(['msaqtdlugares' => "{$aCampos['qtdlugares']}", 'msasituacao' => "{$aCampos['situacao']}"]);

        return $this->show($aCampos['estabelecimento']);
    }

    public function getMesa($iCodigo) {
        return DB::select("SELECT *
                              FROM tbmesa
                             WHERE msacodigo = '{$iCodigo}'");
    }

    public function getMaxCodigoMesa() {
        $maxCodigo = DB::select('SELECT MAX(msacodigo) maxcodigo FROM tbmesa');

        return response()->json($maxCodigo);
    }

}