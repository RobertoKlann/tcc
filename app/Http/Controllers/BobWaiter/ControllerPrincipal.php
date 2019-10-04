<?php

namespace App\Http\Controllers\BobWaiter;

use App\Http\Controllers\Controller;

/**
 * Controlador Principal.
 *
 * @package Controller
 * @author  Roberto Oswaldo Klann
 * @since   23/08/2019
 */
class ControllerPrincipal extends Controller {

    public function index() {
        return view('home');
    }

    public function getViewEstabelecimento() {
        return view('bobWaiter/ViewEstabelecimento');
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