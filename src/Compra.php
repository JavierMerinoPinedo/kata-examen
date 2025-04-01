<?php

namespace Deg540\DockerPHPBoilerplate;

class Compra
{
    public String $productos = '';
    public function execute($string): string
    {
        // $string = 'añadir pan x1';
        $string = explode(' ', $string);
        $cantidad = (count($string) < 3) ? 1 : $string[2];

        if($string[0] == 'añadir') {
            if($this->productos != '') {
                if (str_contains($this->productos, strtolower($string[1]))) {
                    $prod = explode(' ', $this->productos);
                    $cantidad = ((int) $prod[1][1] + $cantidad);
                    $this->productos = strtolower($string[1]) . ' x' . $cantidad;
                }
            } else {
                $this->productos = $this->productos . strtolower($string[1]) . ' x' . $cantidad;
            }
        }

        return $this->productos;
    }
}
