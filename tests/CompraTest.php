<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\Compra;
use PHPUnit\Framework\TestCase;

class CompraTest extends TestCase
{
    /**
     * @test
     */
    public function givenAProductIsAddedToThePurchase(): void
    {
        $compra = new Compra();

        $result = $compra->execute('añadir pan 2');

        $this->assertEquals('pan x2', $result);
    }

    /**
     * @test
     */
    public function givenAProductWithUpperAndLowerCaseIsAddedToThePurchaseWithLowerCase(): void
    {
        $compra = new Compra();

        $result = $compra->execute('añadir PaN 2');

        $this->assertEquals('pan x2', $result);
    }
}
