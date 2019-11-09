<?php

namespace App\Http\Controllers\BobWaiter;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Request;

/**
 * Controllador das Categorias de Estabelecimento.
 *
 * @package Controller
 * @author  Roberto Klann
 * @since   26/08/2019
 */
class ControllerEstabelecimento extends Controller {

    public function create() {
        return view('bobWaiter/ViewIncluirEstabelecimento');
    }

    public function edit($iCodigo) {
        $oEstabelecimento = $this->getEstabelecimento($iCodigo);

        return view('bobWaiter/ViewAlterarEstabelecimento')->with('est', $oEstabelecimento);
    }

    /**
     * SQL padrão da Consulta de Estabelecimento.
     *
     * @return Object
     */
    public function show() {
        $bEst = DB::select('SELECT *
                              FROM tbestabelecimento
                              JOIN tbcategoriaestabelecimento
                             USING (ctecodigo)
                          ORDER BY estcodigo ASC
        ');

        return view('bobWaiter/ViewEstabelecimento')->with('estabelecimento', $bEst);
    }

    public function store() {
        $aCampos = Request::all();
        try {
            DB::insert("INSERT INTO tbestabelecimento
                         VALUES({$aCampos['codigo']}, '{$aCampos['nomerazao']}', '{$aCampos['endereco']}',
                         '{$aCampos['horario']}', {$aCampos['catcodigo']}
            )");
        } catch(RuntimeException $e) {
            return redirect()->route('estabelecimento.index');
        }

        return redirect()->route('estabelecimento.index');
    }

    public function destroy($iCodigo) {
        try {
            DB::table('tbestabelecimento')->where('estcodigo', '=', $iCodigo)->delete();
        } catch(RuntimeException $e) {
            return response()->json(['success' => $e->getMessage()]);
        }

        return response()->json(['success' => 'true']);
    }

    public function update() {
        $aCampos = Request::all();
        DB::table('tbestabelecimento')->where('estcodigo', '=', "{$aCampos['codigo']}")->update(
            [
                'estnomerazao' => "{$aCampos['nomerazao']}",
                'estendereco'  => "{$aCampos['endereco']}",
                'esthorario'   => "{$aCampos['horario']}",
                'ctecodigo'    => "{$aCampos['catcodigo']}"
            ]
        );

        return redirect()->route('estabelecimento.index');
    }

    public function getEstabelecimento($iCodigo) {
        return $oCat = DB::select("SELECT *
                              FROM tbestabelecimento
                              JOIN tbcategoriaestabelecimento
                                ON tbcategoriaestabelecimento.ctecodigo = tbestabelecimento.ctecodigo
                             WHERE estcodigo = '{$iCodigo}'");
    }

    public function getMaxCodigoEstabelecimento() {
        $maxCodigo = DB::select('SELECT MAX(estcodigo) maxcodigo FROM tbestabelecimento');

        return response()->json($maxCodigo);
    }

    public function getAllCategoriasEst() {
        $aCategorias = DB::select('SELECT * FROM tbcategoriaestabelecimento');

        return response()->json($aCategorias);
    }

    public function getEstabelecimentos() {
        $aEst = DB::select('SELECT * FROM tbestabelecimento');

        return response()->json($aEst);
    }

}