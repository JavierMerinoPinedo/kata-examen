<?php

namespace Deg540\DockerPHPBoilerplate;

class Compra
{
    public String $productos = '';
    public function execute($string): string
    {
        $string = explode(' ', $string);
        $cantidad = (count($string) < 3) ? 1 : $string[2];

        if($string[0] == 'añadir') {
            if($this->productos != '') {
                if (str_contains($this->productos, strtolower($string[1]))) {
                    $prod = explode(' ', $this->productos);
                    $cantidad = ((int) $prod[1][1] + $cantidad);
                    $this->productos = strtolower($string[1]) . ' x' . $cantidad;
                } else {
                    $this->productos = $this->productos . ', ' . strtolower($string[1]) . ' x' . $cantidad;
                }
            } else {
                $this->productos = $this->productos . strtolower($string[1]) . ' x' . $cantidad;
            }
        } elseif ($string[0] == 'eliminar') {
            if($this->productos == '' || !str_contains($this->productos, strtolower($string[1]))) {

                return 'El producto seleccionado no existe';
            }
            $this->productos = preg_replace('/' . strtolower($string[1]) . ' x\d+/', '', $this->productos);
        } elseif ($string[0] == 'vaciar') {
            $this->productos = '';
        }

        return $this->productos;
    }
}
