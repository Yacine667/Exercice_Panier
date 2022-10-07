<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Produit</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<div id=gen>
<body>

<div class="container-fluid">

<div class="container">

      <nav class="navbar navbar-expand-md navbar-light ">
        <a class="navbar-brand" href="http://localhost/appli/index.php">Ajout De Produit |</a>
        <a class="navbar-brand" href="http://localhost/appli/recap.php">|  Récapitulatif Des Produits</a>
      </nav>
    

    <h1>Ajouter un produit</h1>

    <form action="traitement.php" method="post">
        <p>
            <label>
                Nom du produit :
                <input type="text" class="form-control form-control-lg mb-3 shadow-lg" name="name">
            </label>
        </p>

        <p>
            
            <label>
                Prix du produit :
                <input type="number" class="form-control form-control-lg mb-3 shadow-lg" step="any" name="price">
            </label>
        </p>

        <p>
            <label>
                Quantité désirée :
                <input type="number" class="form-control form-control-lg mb-3 shadow-lg" name="qtt" value="1">
            </label>            
        </p>

        <p>
            <input class="btn btn-primary mb-2 shadow-lg" type="submit" name="submit" value="Ajouter le produit">
        </p>
    </form>
  




    </div>    
    
</div>



</body>
</div>
</html>