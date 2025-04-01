<?php

namespace Deg540\DockerPHPBoilerplate;

class Compra
{
    public function execute($string): string
    {
        // $string = 'añadir pan x1';
        $string = explode(' ', $string);
        $cantidad = (count($string) < 3) ? 1 : $string[2];

        return $string[1] . ' x' . $cantidad;
    }
}
