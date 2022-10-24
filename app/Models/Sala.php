<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sala extends Model
{
    use HasFactory;

    /**
     * insert Function
     * Registra uma nova Sala no banco de dados.
     */
    public static function insert( $name, $lotacao ) {
        return DB::table('salas')->insert([
            'nome' => $name,
            'lotacao' => $lotacao
        ]);
    }

    /**
     * select Function
     * Busca todos as Salas cadastradas.
     */
    public static function select () {

        return DB::table('salas')->get();
    }

    /**
     * where Function
     * Busca uma Sala específica cadastrada e os participantes em cada etapa do evento.
     */
    public static function whereByEtapas ( $id, $etapa ) {
        return DB::table('salas')
                    ->join( 'cadastros', 'salas.id', '=', 'cadastros.id_sala' )
                    ->join( 'participantes', 'participantes.id', '=', 'cadastros.id_participante' )
                    ->where( 'salas.id', '=', $id )
                    ->where( 'cadastros.etapa', '=', $etapa )
                    ->get();
    }

    /**
     * where Function
     * Busca uma Sala específica cadastrada.
     */
    public static function where ( $id ) {
        return DB::table('salas')
                    ->where( 'id', '=', $id )
                    ->get();
    }

    /**
     * Seleciona o espaço de café com vagas disponíveis
     */
    public static function getBestSala( $etapa ) {
        
        $salas = DB::table('salas')
                    ->inRandomOrder()
                    ->get();
        
        foreach ( $salas as $sala ) {
            $cadastros = DB::table( 'cadastros' )
                    ->where( 'id_sala', '=', $sala->id )
                    ->where( 'etapa', '=', $etapa )
                    ->get();
            
            if ( $sala->lotacao - count( $cadastros ) >= 0 ) {
                return $sala->id;
                break;
            }
        }
    }
}
