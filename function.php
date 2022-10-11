<?php

function addpanier () {

    $panier = 0;

    foreach($_SESSION['products'] as $index => $product){

        $panier += $product['qtt'];
    }

    return $panier;
}

function afficherMessage(){
    if (isset($_SESSION['messages'])){
        return $_SESSION['messages'];
    }else{
        return null;
    }
}






?>