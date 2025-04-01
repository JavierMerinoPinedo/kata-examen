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

    /**
     * @test
     */
    public function givenAProductWithoutQuantityIsAddedToPurchaseWithQuantityOne(): void
    {
        $compra = new Compra();

        $result = $compra->execute('añadir pan');

        $this->assertEquals('pan x1', $result);
    }

    /**
     * @test
     */
    public function givenAProductThatIsAddedToThePurchaseTheQuantityIncrease(): void
    {
        $compra = new Compra();

        $compra->execute('añadir pan 2');
        $result = $compra->execute('añadir PaN 3');

        $this->assertEquals('pan x5', $result);
    }
}
