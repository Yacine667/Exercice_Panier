<?php 

require('db_functions.php');

$products = findAll();

foreach ($products as $product) {
    
    $id= $product['id'];
  
        echo "<h2><a href='product.php?id=$id'>". $product['name']." </a></h2>"?>

        <p><?php echo $product['description'] ?></p>

        <strong><p><?php echo $product['price'] ?>€</p></strong>
       
        <?php echo "<a href='traitement.php?action=ajouterProduitBask&id=$id'>Ajouter au panier</a>"?>

    <?php
    }


?>