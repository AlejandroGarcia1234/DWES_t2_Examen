<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Menú Pizzería</title>
    
</head>

<body>

<?php
function mostrarMenu($articulos) {

    echo '<h1>Nuestro menú</h1>';
    echo '<h2>Pizzas</h2>';

    foreach ($articulos as $articulo) {
        if ($articulo instanceof Pizza) {
            echo $articulo->nombre . '<br>';
        }
    }
 
    echo '<h2>Bebidas</h2>';
    foreach ($articulos as $articulo) {
        if ($articulo instanceof Bebida) {
            echo $articulo->nombre . '<br>';
        }
    }
 
    echo '<h2>Otros</h2>';
    foreach ($articulos as $articulo) {
        if (!($articulo instanceof Pizza) && !($articulo instanceof Bebida)) {
            echo $articulo->nombre . '<br>';
        }
    }
}
 
function mostrarMasVendidos($articulos) {

    echo '<h1>Los más vendidos</h1>';

    usort($articulos, function($art1, $art2) {
        return $art2->contador - $art1->contador;
    });
 
    for ($i = 0; $i < 3; $i++) {
        echo $articulos[$i]->nombre . ' - Vendidos: ' . $articulos[$i]->contador . '<br>';
    }
}
 
function mostrarMasLucrativos($articulos) {

    echo '<h1>¡Los más lucrativos!</h1>';

    usort($articulos, function($art1, $art2) {
        return $art2->calcularBeneficio() - $art1->calcularBeneficio();
    });
 
    foreach ($articulos as $articulo) {
        echo $articulo->nombre . ' - Beneficio: $' . $articulo->calcularBeneficio() . '<br>';
    }
}

?>

</body>

</html>