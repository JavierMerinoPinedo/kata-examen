<?php

namespace Deg540\DockerPHPBoilerplate;

class Compra
{
    private array $productos = [];
    public function execute($string): string
    {
        // $string = 'añadir pan x1';
        $string = explode(' ', $string);
        $cantidad = (count($string) < 3) ? 1 : $string[2];

        if($string[0] == 'añadir') {
            $this->productos[] = strtolower($string[1]) . ' x' . $cantidad;
        }

        return $this->productos[0];
    }
}
