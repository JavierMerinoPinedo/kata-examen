<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\Compra;
use PHPUnit\Framework\TestCase;

class CompraTest extends TestCase
{
    /**
     * @test
     */
    public function dadoUnProductoSeAñadeALaCompra(): void
    {
        $compra = new Compra();

        $result = $compra->execute('añadir pan 2');

        $this->assertEquals('pan x2', $result);
    }
}
