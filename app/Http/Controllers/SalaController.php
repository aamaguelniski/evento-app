<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\Cadastro;

class SalaController extends Controller
{
    /**
     * Store Function
     * Cadastra novas Salas no banco de dados.
     */
    public function store ( Request $request ) {
        
        $name = $request->input( 'nome' );
        $lotacao = $request->input( 'lotacao' );

        $insert = Sala::insert($name, $lotacao );
        
        return redirect()->route('salas');;
    }

    /**
     * Show Function
     * Exibe a lista de Salas cadastradas.
     * 
     * @return \Illuminate\View\View
     */
    public function show() {

        return view( 'salas', [ 
            'salas' => Sala::select()
        ]);
    }

    /**
     * Query Function
     * Exibe os detalhes de uma Sala.
     */
    public function query( $id ) {
        return view( 'salaInfo', [
            'sala_info' => Sala::where( $id ),
            'etapa1' => Sala::whereByEtapas( $id, 1 ),
            'etapa2' => Sala::whereByEtapas( $id, 2 )
        ]);
    }
}
