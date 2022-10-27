
<a href=index.php>Retour</a>

<?php 

require('db_functions.php');

$product = findOneById($_GET['id']);

?>

<h1><?php echo $product['name'] ?></h1>

<p><?php echo $product['description'] ?></p>

<p><?php echo $product['price'] ?> €</p>

<?php echo "<a href='traitement.php?action=ajouterProduitBask&id=$product[id]'>Ajouter au panier</a>"?>

