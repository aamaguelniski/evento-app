<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\Sala;
use App\Models\Participante;

class HomeController extends Controller
{
    /**
     * Retorna a página inicial
     */
    public function show() {
        return view( 'home', [
            'participantes' => Participante::selectLimit( 10 ),
            'cafes' => Cafe::select(),
            'salas' => Sala::select()
        ]);
    }
}
