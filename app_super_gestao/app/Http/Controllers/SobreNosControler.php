<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Middleware\LogAcessoMiddleware;

use function Ramsey\Uuid\v1;

class SobreNosControler extends Controller
{
    public function __construct() {
        $this->middleware('log.acesso');
    }

    public function sobreNos() {
        return view('site.sobre-nos');
    }
}
