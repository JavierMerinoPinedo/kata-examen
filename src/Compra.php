<?php

namespace Deg540\DockerPHPBoilerplate;

class Compra
{
    public function execute($string): string
    {
        // $string = 'añadir pan x1';
        $string = explode(' ', $string);
        if(count($string) < 3) {
            $cantidad = 1;
        } else {
            $cantidad = $string[2];
        }
        return $string[1] . ' x' . $cantidad;
    }
}