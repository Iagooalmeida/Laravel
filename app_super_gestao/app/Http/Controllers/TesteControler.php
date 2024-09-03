<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteControler extends Controller
{
    public function teste($p1, $p2) {
        // echo "A soma de $p1 + $p2 é: " . ($p1 + $p2);
        // return view('site.teste', ['p1' => $p1, 'p2' => $p2]); // Passando parâmetros para a view
        //return view('site.teste', compact('p1', 'p2')); // Metodo compact
        return view('site.teste')->with('p1', $p1)->with('p2', $p2); // Metodo with
    }
}
