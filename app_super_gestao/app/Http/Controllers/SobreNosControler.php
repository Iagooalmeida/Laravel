<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class SobreNosControler extends Controller
{
    public function sobreNos() {
        return view('site.sobre-nos');
    }
}
