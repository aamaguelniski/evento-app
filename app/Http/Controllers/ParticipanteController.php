<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Participante;
use App\Models\Cafe;
use App\Models\Sala;
use App\Models\Cadastro;

class ParticipanteController extends Controller
{

    /**
     * Store Function
     * Cadastra novos Participantes no banco de dados.
     */
    public function store ( Request $request ) {
        
        $nome = $request->input( 'primeiroNome' );
        $sobrenome = $request->input( 'sobrenome' );

        /**
         * Cadastro do participante no banco de dados com captura do ID
         */
        $id_participante = Participante::insert($nome, $sobrenome );

        /**
         * Captura do ID da Sala e Espaços de café ideais para o participante em cada etapa
         */
        for ( $cont = 1; $cont < 3; $cont ++ ) {
            $id_cafe = Cafe::getBestCafe( $cont );
            $id_sala = Sala::getBestSala( $cont );

            DB::table('cadastros')->insert([
                'id_cafe' => $id_cafe,
                'id_sala' => $id_sala,
                'id_participante' => $id_participante,
                'etapa' => $cont
            ]);
        }
        
        return redirect()->route('participantes');
    }

    /**
     * Query Function
     * Exibe os detalhes de um Espaco para Café.
     */
    public function query( $id ) {
        return view( 'participantesInfo', [
            'participante' => Participante::where( $id ),
            'cafe_etapa1' => Participante::whereCafeEtapas( $id, 1 ),
            'cafe_etapa2' => Participante::whereCafeEtapas( $id, 2 ),
            'sala_etapa1' => Participante::whereSalaEtapas( $id, 1 ),
            'sala_etapa2' => Participante::whereSalaEtapas( $id, 2 )
        ]);
    }

    /**
     * Show Function
     * Captura todos os Espaços para Café cadastrados no banco de dados.
     */
    public function show() {
        return view( 'participantes', [ 
            'participantes' => Participante::select() 
        ]);
    }

    /**
     * Exibe a view ara confiermar a deleção do participante
     */
    public function delete ( $id ) {

        return view( 'delParticipante', [
            'participante' => Participante::where( $id )
        ]);
    }

    /**
     * Deleta o participante e retoma a view da listagem de participantes.
     */
    public function confirmDelete ( $id ) {

        $cadastros = DB::table('cadastros')
                        ->where( 'id_participante', '=', $id )
                        ->get();

        if ( count( $cadastros ) > 0 ) {
            foreach ( $cadastros as $cadastro ) {
                $cad = Cadastro::find( $cadastro->id );
                $cad->delete();
            }
        }
        $participante = Participante::find( $id );
        $participante->delete();
        
        return redirect()->route('participantes');;
    }
}
