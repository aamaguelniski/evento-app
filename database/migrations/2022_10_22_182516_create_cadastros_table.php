<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastros', function (Blueprint $table) {
            $table->id();

            /**
             * Table columns
             * 
             * @since 0.1.0
             */
            $table->integer( 'id_participante' );
            $table->integer( 'id_sala' );
            $table->integer( 'id_cafe' );
            $table->integer( 'etapa' );
            $table->timestamps();

            /**
             * Foreign keys
             * 
             * @since 0.1.0
             */
            $table->foreign( 'id_participante' )->references( 'id' )->on( 'participantes' );
            $table->foreign( 'id_sala' )->references( 'id' )->on( 'salas' );
            $table->foreign( 'id_cafe' )->references( 'id' )->on( 'cafes' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /**
         * Dropping Foreign Keys
         * 
         * @since 0.1.0
         */
        $table->dropForeign( 'cadastros_id_participante_foreign' );
        $table->dropForeign( 'cadastros_id_sala_foreign' );
        $table->dropForeign( 'cadastros_id_cafe_foreign' );

        /**
         * Dropping Table
         */
        Schema::dropIfExists('cadastros');
    }
};
