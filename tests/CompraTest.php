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
        $this->assertEquals('pan x2', $this->compra->execute('añadir pan 2'));
    }

    /**
     * @test
     */
    public function givenAProductWithUpperAndLowerCaseIsAddedToThePurchaseWithLowerCase(): void
    {
        $this->assertEquals('pan x2', $this->compra->execute('añadir PaN 2'));
    }

    /**
     * @test
     */
    public function givenAProductWithoutQuantityIsAddedToPurchaseWithQuantityOne(): void
    {
        $this->assertEquals('pan x1', $this->compra->execute('añadir pan'));
    }

    /**
     * @test
     */
    public function givenAProductThatIsAddedToThePurchaseTheQuantityIncrease(): void
    {
        $this->compra->execute('añadir pan 2');

        $this->assertEquals('pan x5', $this->compra->execute('añadir PaN 3'));
    }

    /**
     * @test
     */
    public function givenAProductThatIsNotAddedToThePurchaseAddedToThePurchase(): void
    {
        $this->compra->execute('añadir pan 2');
        $this->assertEquals('pan x2, leche x3', $this->compra->execute('añadir leche 3'));
    }

    /**
     * @test
     */
    public function givenAProductDeleteFromThePurchaseTheProduct(): void
    {
        $this->compra->execute('añadir pan 2');
        $this->assertEquals('', $this->compra->execute('eliminar pan'));
    }

    /**
     * @test
     */
    public function givenAProductThatNotExistsInTHePurchaseReturnsErrorMessage(): void
    {
        $this->compra->execute('añadir pan 2');
        $this->assertEquals('El producto seleccionado no existe', $this->compra->execute('eliminar leche'));
    }

    /**
     * @test
     */
    public function givenAEmptyOrderReturnsEmptyPurchase(): void
    {
        $this->assertEquals('', $this->compra->execute('vaciar'));
    }
}
