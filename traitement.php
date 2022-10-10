<?php

    session_start();

    $action = $_GET["action"];
    $id = (isset($_GET["id"])) ? $_GET["id"] : "";

    switch($action) {
        case "ajouterProduit": 
            if(isset($_POST['submit'])){

                $name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING);
        
                $price = filter_input(INPUT_POST,"price",FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
        
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
        
            header("Location:index.php");
        break;

        case "viderPanier":
            unset($_SESSION["products"]);
            header("Location:recap.php");
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
            unset($_SESSION["products"][$id]);
            header("Location:recap.php");
        break;

    }

    