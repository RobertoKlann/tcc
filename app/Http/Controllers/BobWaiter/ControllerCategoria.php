<?php

namespace App\Http\Controllers\BobWaiter;

use App\Http\Controllers\Controller;
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

    public function create() {
        return view('bobWaiter/ViewIncluirCategoria');
    }

    public function edit($iCodigo) {
        $oCategoria = $this->getCategoria($iCodigo);

        return view('bobWaiter/ViewAlterarCategoria')->with('cat', $oCategoria);
    }

    /**
     * SQL padrão da Consulta de Categoria.
     *
     * @return Object
     */
    public function show() {
        $bCat = DB::select('SELECT *
                              FROM tbcategoria
                          ORDER BY ctgcodigo ASC
        ');

        return view('bobWaiter/ViewCategoria')->with('categorias', $bCat);
    }

    public function store() {
        $aCampos = Request::all();
        try {
            DB::insert("INSERT INTO tbcategoria(ctgcodigo, ctgdescricao)
                         VALUES({$aCampos['codigo']}, '{$aCampos['descricao']}')");
        } catch(RuntimeException $e) {
            return redirect()->route('categoria.index');
        }

        return redirect()->route('categoria.index');
    }

    public function destroy($iCodigo) {
        try {
            DB::table('tbcategoria')->where('ctgcodigo', '=', $iCodigo)->delete();
        } catch(RuntimeException $e) {
            return response()->json(['success' => $e->getMessage()]);
        }

        return response()->json(['success' => 'true']);
    }

    public function update() {
        $aCampos = Request::all();
        DB::table('tbcategoria')->where('ctgcodigo', '=', "{$aCampos['codigo']}")->update(['ctgdescricao' => "{$aCampos['descricao']}"]);

        return redirect()->route('categoria.index');
    }

    public function getCategoria($iCodigo) {
        return DB::select("SELECT * FROM tbcategoria WHERE ctgcodigo = '{$iCodigo}'");
    }

    public function getMaxCodigoCategoria() {
        $maxCodigo = DB::select('SELECT MAX(ctgcodigo) maxcodigo FROM tbcategoria');

        return Response::json($maxCodigo);
    }

}