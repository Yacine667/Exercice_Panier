<?php

function addpanier () {

    $panier = 0;

    foreach($_SESSION['products'] as $index => $product){

        $panier += $product['qtt'];
    }

    return $panier;
}






?>