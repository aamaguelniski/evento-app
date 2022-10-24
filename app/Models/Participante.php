<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Participante extends Model
{
    use HasFactory;

    /**
     * insert Function
     * Registra um novo Participante no banco de dados.
     */
    public static function insert( $nome, $sobrenome ) {
        return DB::table('participantes')->insertGetId([
            'nome' => $nome,
            'sobrenome' => $sobrenome
        ]);
    }

    /**
     * Busca todos os participantes cadastrados
     */
    public static function select() {
        return DB::table('participantes')->get();
    }

    /**
     * Busca todos os participantes cadastrados
     */
    public static function selectLimit( $limit ) {
        return DB::table('participantes')
                    ->paginate(10);
    }

    /**
     * where Function
     * Busca um Participante específico cadastrados.
     */
    public static function where ( $id ) {
        return DB::table('participantes')
                    ->where( 'id', '=', $id )
                    ->get();
    }

    /**
     * where Function
     * Busca um Espaços para Café específico cadastrado onde o Participante ira participar do evento em cada etapa.
     */
    public static function whereCafeEtapas ( $id, $etapa ) {
        return DB::table('participantes')
                    ->join( 'cadastros', 'participantes.id', '=', 'cadastros.id_participante' )
                    ->join( 'cafes', 'cafes.id', '=', 'cadastros.id_cafe' )
                    ->where( 'participantes.id', '=', $id )
                    ->where( 'cadastros.etapa', '=', $etapa )
                    ->get();
    }

    /**
     * where Function
     * Busca uma Sala específica cadastrada onde o Participante ira participar do evento em cada etapa.
     */
    public static function whereSalaEtapas ( $id, $etapa ) {
        return DB::table('participantes')
                    ->join( 'cadastros', 'participantes.id', '=', 'cadastros.id_participante' )
                    ->join( 'salas', 'cadastros.id_sala', '=', 'salas.id' )
                    ->where( 'participantes.id', '=', $id )
                    ->where( 'cadastros.etapa', '=', $etapa )
                    ->get();
    }
}
