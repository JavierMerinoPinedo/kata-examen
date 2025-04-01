<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\Compra;
use PHPUnit\Framework\TestCase;

class CompraTest extends TestCase
{
    private Compra $compra;
    protected function setUp(): void
    {
        parent::setUp();
        $this->compra = new Compra();
    }

    /**
     * @test
     */
    public function givenAProductIsAddedToThePurchase(): void
    {
        $result = $this->compra->execute('añadir pan 2');

        $this->assertEquals('pan x2', $result);
    }

    /**
     * @test
     */
    public function givenAProductWithUpperAndLowerCaseIsAddedToThePurchaseWithLowerCase(): void
    {
        $result = $this->compra->execute('añadir PaN 2');

        $this->assertEquals('pan x2', $result);
    }

    /**
     * @test
     */
    public function givenAProductWithoutQuantityIsAddedToPurchaseWithQuantityOne(): void
    {
        $result = $this->compra->execute('añadir pan');

        $this->assertEquals('pan x1', $result);
    }

    /**
     * @test
     */
    public function givenAProductThatIsAddedToThePurchaseTheQuantityIncrease(): void
    {
        $this->compra->execute('añadir pan 2');
        $result = $this->compra->execute('añadir PaN 3');

        $this->assertEquals('pan x5', $result);
    }

    /**
     * @test
     */
    public function givenAProductThatIsNotAddedToThePurchaseAddedToThePurchase(): void
    {
        $this->compra->execute('añadir pan 2');
        $result = $this->compra->execute('añadir leche 3');

        $this->assertEquals('pan x2, leche x3', $result);
    }

    /**
     * @test
     */
    public function givenAProductDeleteFromThePurchaseTheProduct(): void
    {
        $this->compra->execute('añadir pan 2');
        $result = $this->compra->execute('eliminar pan');

        $this->assertEquals('', $result);
    }
}
