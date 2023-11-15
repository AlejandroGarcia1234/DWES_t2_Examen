<?php
class Articulo {
    public $nombre;
    public $coste;
    public $precio;
    public $contador;
 
    public function __construct($nombre, $coste, $precio, $contador) {
        $this->nombre = $nombre;
        $this->coste = $coste;
        $this->precio = $precio;
        $this->contador = $contador;
    }
 
    public function calcularBeneficio() {
        return ($this->precio - $this->coste) * $this->contador;
    }
}

?>