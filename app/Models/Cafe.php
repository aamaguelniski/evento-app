<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cafe extends Model
{
    use HasFactory;

    /**
     * insert Function
     * Registra um novo Espaço para Café no banco de dados.
     */
    public static function insert( $name, $lotacao ) {
        return DB::table('cafes')->insert([
            'nome' => $name,
            'lotacao' => $lotacao
        ]);
    }
    /**
     * select Function
     * Busca todos os Espaços para Café cadastrados.
     */
    public static function select () {

        return DB::table('cafes')->get();
    }

    /**
     * where Function
     * Busca um Espaços para Café específico cadastrados e .
     */
    public static function whereByEtapas ( $id, $etapa ) {
        return DB::table('cafes')
                    ->join( 'cadastros', 'cafes.id', '=', 'cadastros.id_cafe' )
                    ->join( 'participantes', 'participantes.id', '=', 'cadastros.id_participante' )
                    ->where( 'cafes.id', '=', $id )
                    ->where( 'cadastros.etapa', '=', $etapa )
                    ->get();
    }

    /**
     * where Function
     * Busca um Espaços para Café específico cadastrados.
     */
    public static function where ( $id ) {
        return DB::table('cafes')
                    ->where( 'id', '=', $id )
                    ->get();
    }

    /**
     * Seleciona o espaço de café com vagas disponíveis
     */
    public static function getBestCafe( $etapa ) {
        
        $cafes = DB::table('cafes')
                    ->inRandomOrder()
                    ->get();
        
        foreach ( $cafes as $cafe ) {
            $cadastros = DB::table( 'cadastros' )
                    ->where( 'id_cafe', '=', $cafe->id )
                    ->where( 'etapa', '=', $etapa )
                    ->get();
            
            if ( $cafe->lotacao - count( $cadastros ) >= 0 ) {
                return $cafe->id;
                break;
            }
        }
    }
}
