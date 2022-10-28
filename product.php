
<a href=index.php>Retour</a>

<?php 

require('db_functions.php');

$product = findOneById($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id=gen>
<div class="container-fluid">

<div class="container">


<table class='table table-light table-hover'>
                <thead>
                    <tr>
                        
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Action</th>
                    </tr>
                </thead>
            <tbody>

            <tr>


            <td><?php echo $product['name'] ?></td>

            <td><?php echo $product['description'] ?></td>

            <td><?php echo $product['price'] ?> €</td>

            <td><?php echo "<a href='traitement.php?action=ajouterProduitBask&id=$product[id]'>Ajouter au panier</a>"?></td>
            </tr>       
                </tbody
            </table>

            </div>   
            </div>  
</div>       

