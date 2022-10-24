<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cafe;
use App\Models\Cadastro;


class CafeController extends Controller
{
    /**
     * Store Function
     * Cadastra novos Espaços para Café no banco de dados.
     */
    public function store ( Request $request ) {
        
        $name = $request->input( 'nome' );
        $lotacao = $request->input( 'lotacao' );

        $insert = Cafe::insert($name, $lotacao );
        
        return redirect()->route('cafes');;
    }

    /**
     * Show Function
     * Exibe a lista de Espaços para Café cadastrados.
     * 
     * @return \Illuminate\View\View
     */
    public function show() {

        return view( 'cafes', [ 
            'cafes' => Cafe::select()
        ]);
    }

    /**
     * Query Function
     * Exibe os detalhes de um Espaco para Café.
     */
    public function query( $id ) {
        return view( 'cafeInfo', [
            'cafe_info' => Cafe::where( $id ),
            'etapa1' => Cafe::whereByEtapas( $id, 1 ),
            'etapa2' => Cafe::whereByEtapas( $id, 2 )
        ]);
    }
}
