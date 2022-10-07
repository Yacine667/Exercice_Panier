<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recapitulatif des produits</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div id=gen>

        <div class="container-fluid" >

            <div class="container" >

                <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="http://localhost/appli/index.php">Ajout De Produit |</a>
                <a class="navbar-brand" href="http://localhost/appli/recap.php">|  Récapitulatif Des Produits</a>
                </nav>
    

<?php 

    if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p> Aucun produit en session...</p>";
    }

    else{

        echo "<table class='table table-light table-hover'>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                    "</tr>",
                "</thead>",
            "<tbody>";

        $totalGeneral = 0;

        foreach($_SESSION['products'] as $index => $product){

            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2,",", "&nbsp;")."&nbsp;€</td>",
                    "<td>".$product['qtt']."</td>",
                    "<td>".number_format($product['total'], 2,",", "&nbsp;")."&nbsp;€</td>",
                "</tr>";
            $totalGeneral += $product['total'];
        }

        echo "<tr>",
                "<td colspan=4> Total général : </td>",
                "<td><strong>". number_format($totalGeneral, 2, ",","&nbsp;"). "&nbsp;€ </strong></td>",
                "</tr>",        
            "</tbody",
        "</table>";
    }   
    
?>

            </div>

        </div>

    </div>

</body>

</html>