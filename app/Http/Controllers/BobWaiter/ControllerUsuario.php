<?php

namespace App\Http\Controllers\BobWaiter;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Request;

/**
 * Controllador de usuário.
 *
 * @package Controller
 * @author  Roberto Klann
 * @since   27/08/2019
 */
class ControllerUsuario extends Controller {

    public function create() {
        return view('bobWaiter/ViewIncluirUsuario');
    }

    public function edit($iCodigo) {
        $oUsuario = $this->getUsuario($iCodigo);

        return view('bobWaiter/ViewAlterarUsuario')->with('usu', $oUsuario);
    }

    /**
     * SQL padrão da Consulta de Usuários.
     *
     * @return Object
     */
    public function show() {
        $bUsuario = DB::select('SELECT *
                                  FROM tbusuario
                              ORDER BY usucodigo ASC
        ');

        return view('bobWaiter/ViewUsuario')->with('usuarios', $bUsuario);
    }

    public function store() {
        $aCampos = Request::all();
        try {
            DB::insert("INSERT INTO tbusuario
                         VALUES({$aCampos['codigo']}, '{$aCampos['nomerazao']}', '{$aCampos['cpf']}',
                         '{$aCampos['endereco']}', '{$aCampos['bairro']}', '{$aCampos['telefone']}', '{$aCampos['cidade']}', '{$aCampos['estado']}',
                         {$aCampos['status']}, {$aCampos['tipo']}, '{$aCampos['password']}', '{$aCampos['email']}', '{$aCampos['usudatanascimento']}')");
        } catch(RuntimeException $e) {
            return redirect()->route('usuario.index');
        }

        return redirect()->route('usuario.index');
    }

    public function destroy($iCodigo) {
        try {
            DB::table('tbusuario')->where('usucodigo', '=', $iCodigo)->delete();
        } catch(RuntimeException $e) {
            return response()->json(['success' => $e->getMessage()]);
        }

        return response()->json(['success' => 'true']);
    }

    public function update() {
        $aCampos = Request::all();
        DB::table('tbusuario')->where('usucodigo', '=', "{$aCampos['codigo']}")->update(
            [
                'usunome'           => "{$aCampos['nomerazao']}",
                'usucpf'            => "{$aCampos['cpf']}",
                'usuendereco'       => "{$aCampos['endereco']}",
                'usubairro'         => "{$aCampos['bairro']}",
                'usutelefone'       => "{$aCampos['telefone']}",
                'usucidade'         => "{$aCampos['cidade']}",
                'usuestado'         => "{$aCampos['estado']}",
                'usustatus'         => "{$aCampos['status']}",
                'usutipo'           => "{$aCampos['tipo']}",
                'password'          => "{$aCampos['password']}",
                'email'             => "{$aCampos['email']}",
                'usudatanascimento' => "{$aCampos['datanascimento']}"
            ]
        );

        return redirect()->route('usuario.index');
    }

    public function getUsuario($iCodigo) {
        return $oCat = DB::select("SELECT *
                                     FROM tbusuario
                                    WHERE usucodigo = '{$iCodigo}'");
    }

    public function getMaxCodigoUsuario() {
        $maxCodigo = DB::select('SELECT MAX(usucodigo) maxcodigo FROM tbusuario');

        return response()->json($maxCodigo);
    }

}