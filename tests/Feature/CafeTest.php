<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Cafe;

class CadastroTest extends TestCase
{
    /**
     * Testando o tamanho do retorno da function getBestcafe.
     *
     * @return void
     */
    public function testRetornoDeUnicoItem()
    {
        $cafes = New Cafe;
        $cafe = $cafes->getBestcafe();

        $this->assertEquals( 2, $cafe );
    }
}
