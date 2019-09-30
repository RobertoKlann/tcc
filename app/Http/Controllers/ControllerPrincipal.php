<?php

namespace App\Http\Controllers;

/**
 * Controlador Principal.
 * 
 * @package Controller
 * @author  Roberto Oswaldo Klann
 * @since   23/08/2019
 */
class ControllerPrincipal extends Controller {

    public function getViewInicial() {
        return view('ViewInicial');
    }

    public function getViewEstabelecimento() {
        return view('ViewEstabelecimento');
    }

    public function getViewCategoriaEstabelecimento() {
        return view('ViewCategoriaEstabelecimento');
    }

    public function getViewCategoria() {
        return view('ViewCategoria');
    }

    public function getViewSubCategoria() {
        return view('ViewSubCategoria');
    }

    public function getViewProduto() {
        return view('ViewProduto');
    }

    public function getViewMesa() {
        return view('ViewMesa');
    }

    public function getViewUsuario() {
        return view('ViewUsuario');
    }

}