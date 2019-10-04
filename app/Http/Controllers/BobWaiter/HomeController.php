<?php

namespace App\Http\Controllers\BobWaiter;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function index() {
        return view('bobWaiter.home');
    }

}