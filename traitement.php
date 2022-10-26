<?php

    session_start();
    require ('function.php');
    require('db_functions.php');


    $action = $_GET["action"];
    $id = (isset($_GET["id"])) ? $_GET["id"] : "";

    switch($action) {

        case "ajouterProduit": 

            if(isset($_POST['submit'])){

                $name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING);
        
                $price = filter_input(INPUT_POST,"price",FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

                //$succes = 'Votre produit est ajouté !';

                //$delete = "Produit supprimé !";
        
                if($name && $price && $qtt){
        
                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price*$qtt
                    ];                    
        
                    $_SESSION['products'][] = $product;
                }
            }  
            
            $_SESSION['messages'] = 'Le produit '.$name.' est bien enregistré !';

            header("Location:index.php");

        break;

        case "viderPanier":

            unset($_SESSION["products"]);
            header("Location:recap.php");
            $_SESSION['messages'] = 'Le panier est vidé !';

        break;

        case "addProduit":

          $_SESSION["products"][$id]['qtt']++;
           header("Location:recap.php");

        break;

        case "retireProduit":

            $newqtt = $_SESSION["products"][$id]['qtt']--;

            if ($newqtt == 1) {
                unset($_SESSION["products"][$id]);
            }
            header("Location:recap.php");

        break;

        case "deleteProduct":
            
            $name = $_SESSION["products"][$id]['name'];
            $_SESSION['messages'] = 'Le produit '.$name.' est bien supprimé !';
            unset($_SESSION["products"][$id]);
            header("Location:recap.php");

        break;

        case "ajouterProduitBask": 

            if(isset($_GET['id'])){   
                
                $product = findOneById($_GET['id']);
                $name = $product['name'];
                $price = $product['price'];
        
                if($name && $price){
        
                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => 1                        
                    ];                    
        
                    $_SESSION['products'][] = $product;
                }
            }  

           
   header("Location:recap.php");
        break;

    }

    

    