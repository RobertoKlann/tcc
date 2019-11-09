<?php

namespace App\Http\Controllers\BobWaiter;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Request;

/**
 * Controllador de produto.
 *
 * @package Controller
 * @author  Roberto Klann
 * @since   26/08/2019
 */
class ControllerProduto extends Controller {

    public function create() {
        return view('bobWaiter/ViewIncluirProduto');
    }

    public function edit($iCodigo) {
        $oProduto = $this->getProduto($iCodigo);

        return view('bobWaiter/ViewAlterarProduto')->with('pro', $oProduto);
    }

    /**
     * SQL padrão da Consulta de Produto.
     *
     * @return Object[]
     */
    public function show($codigo) {
        if(!is_numeric($codigo)) {
            return view('bobWaiter/ViewIncluirProduto');
        }
        
        $bProduto = DB::select('SELECT *
                                  FROM tbproduto
                                  JOIN tbcategoria
                                 USING (ctgcodigo)
                                 WHERE TRUE
                                   AND estcodigo = ' . $codigo . '
                              ORDER BY prdcodigo ASC
        ');

        return view('bobWaiter/ViewProduto')->with('produtos', $bProduto);
    }

    public function store() {
        $aCampos = Request::all();
        DB::insert("INSERT INTO tbproduto
                         VALUES({$aCampos['codigo']}, '{$aCampos['descricao']}',
                         '{$aCampos['preco']}', {$aCampos['ctgcodigo']}
        )");

        return $this->show($aCampos['estabelecimento']);
    }

    public function destroy($iCodigo) {
        try {
            DB::table('tbproduto')->where('prdcodigo', '=', $iCodigo)->delete();
        } catch(RuntimeException $e) {
            return response()->json(['success' => $e->getMessage()]);
        }

        return response()->json(['success' => 'true']);
    }

    public function update() {
        $aCampos = Request::all();
        DB::table('tbproduto')->where('prdcodigo', '=', "{$aCampos['codigo']}")->update(
            [
                'prddescricao' => "{$aCampos['descricao']}",
                'prdpreco'     => "{$aCampos['preco']}",
                'ctgcodigo'    => "{$aCampos['ctgcodigo']}",
            ]
        );

        return $this->show($aCampos['estabelecimento']);
    }

    public function getProduto($iCodigo) {
        return DB::select("SELECT *
                              FROM tbproduto
                              JOIN tbcategoria
                             USING (ctgcodigo)
                             WHERE prdcodigo = '{$iCodigo}'");
    }

    public function getMaxCodigoProduto() {
        $maxCodigo = DB::select('SELECT MAX(prdcodigo) maxcodigo FROM tbproduto');

        return response()->json($maxCodigo);
    }

    public function getAllCategoriasProduto($codigo) {
        $aCategorias = DB::select("SELECT * 
                                     FROM tbcategoria
                                    WHERE TRUE
                                      AND estcodigo = " . $codigo);

        return response()->json($aCategorias);
    }

}