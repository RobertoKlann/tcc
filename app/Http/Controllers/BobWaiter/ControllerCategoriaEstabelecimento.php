<?php

namespace App\Http\Controllers\BobWaiter;

use App\Http\Controllers\Controller;
use RuntimeException;
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

    public function create() {
        return view('bobWaiter/ViewIncluirCategoriaEstabelecimento');
    }

    public function edit($iCodigo) {
        $oCategoria = $this->getCategoriaEstabelecimento($iCodigo);

        return view('bobWaiter/ViewAlterarCategoriaEstabelecimento')->with('catest', $oCategoria);
    }

    /**
     * SQL padrão da Consulta de Categorias de Estabelecimento.
     *
     * @return Object
     */
    public function show() {
        $bCatEst = DB::select('SELECT * FROM tbcategoriaestabelecimento ORDER BY ctecodigo ASC');

        return view('bobWaiter/ViewCategoriaEstabelecimento')->with('catest', $bCatEst);
    }

    public function store() {
        $aCampos = Request::all();
        try {
            DB::insert("INSERT INTO tbcategoriaestabelecimento(ctecodigo, ctedescricao)
                         VALUES({$aCampos['codigo']}, '{$aCampos['descricao']}')");
        } catch(RuntimeException $e) {
            return redirect()->route('estabelecimento.categoria.index');
        }

        return redirect()->route('estabelecimento.categoria.index');
    }

    public function destroy($iCodigo) {
        try {
            DB::table('tbcategoriaestabelecimento')->where('ctecodigo', '=', $iCodigo)->delete();
        } catch(RuntimeException $e) {
            return response()->json(['succes' => $e->getMessage()]);
        }
        return response()->json(['succes' => 'true']);
    }

    public function update() {
        $aCampos = Request::all();
        DB::table('tbcategoriaestabelecimento')->where('ctecodigo', '=', "{$aCampos['codigo']}")->update(['ctedescricao' => "{$aCampos['descricao']}"]);

        return redirect()->route('estabelecimento.categoria.index');
    }

    public function getCategoriaEstabelecimento($iCodigo) {
        return DB::select("SELECT * FROM tbcategoriaestabelecimento WHERE ctecodigo = '{$iCodigo}'");
    }

    public function getMaxCodigo() {
        $maxCodigo = DB::select('SELECT MAX(ctecodigo) maxcodigo FROM tbcategoriaestabelecimento');

        return Response::json($maxCodigo);
    }

}