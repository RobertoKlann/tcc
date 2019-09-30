<?php

namespace App\Http\Controllers;
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

    /**
     * SQL padrão da Consulta de Usuários.
     * 
     * @return Object
     */
    public function getSqlConsultaPadrao() {
        $bUsuario = DB::select('SELECT * 
                                  FROM tbusuario
                              ORDER BY usucodigo ASC
        ');
        
        return view('ViewUsuario')->with('usuarios', $bUsuario);
    }

}