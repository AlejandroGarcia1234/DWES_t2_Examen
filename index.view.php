<?php
function mostrarMenu($articulos) {

    echo '<h1>Nuestro menú</h1>';
    echo '<h2>Pizzas</h2>';

    foreach ($articulos as $articulo) {
        if ($articulo instanceof Pizza) {
            echo $articulo->nombre . ' - $' . $articulo->precio . '<br>';
        }
    }
 
    echo '<h2>Bebidas</h2>';
    foreach ($articulos as $articulo) {
        if ($articulo instanceof Bebida) {
            echo $articulo->nombre . ' - $' . $articulo->precio . '<br>';
        }
    }
 
    echo '<h2>Otros</h2>';
    foreach ($articulos as $articulo) {
        if (!($articulo instanceof Pizza) && !($articulo instanceof Bebida)) {
            echo $articulo->nombre . ' - $' . $articulo->precio . '<br>';
        }
    }
}
 
function mostrarMasVendidos($articulos) {

    echo '<h1>Los más vendidos</h1>';

    usort($articulos, function($a, $b) {
        return $b->contador - $a->contador;
    });
 
    for ($i = 0; $i < 3; $i++) {
        echo $articulos[$i]->nombre . ' - Vendidos: ' . $articulos[$i]->contador . '<br>';
    }
}
 
function mostrarMasLucrativos($articulos) {

    echo '<h1>¡Los más lucrativos!</h1>';
    
    usort($articulos, function($a, $b) {
        return $b->calcularBeneficio() - $a->calcularBeneficio();
    });
 
    foreach ($articulos as $articulo) {
        echo $articulo->nombre . ' - Beneficio: $' . $articulo->calcularBeneficio() . '<br>';
    }
}
?>