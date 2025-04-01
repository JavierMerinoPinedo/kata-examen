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
        $result = $compra->execute('añadir pan');

        $this->assertEquals('pan x1', $result);
    }
}
