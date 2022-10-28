<?php

    session_start();
    require ('function.php');
    require('db_functions.php');

    $action = $_GET["action"];
    $id = (isset($_GET["id"])) ? $_GET["id"] : "";

    switch($action) {

        case "ajouterProduitBdd": 

            if(isset($_POST['submit'])){

                $name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS); 
                
                $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
        
                $price = filter_input(INPUT_POST,"price",FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION); 
                
                if($name && $price && $description){     
                    
                  
                    $id = insertProduct($name,$description,$price);
                    
                    header("Location:product.php?id=$id");
                    
                }

            }             
            
            $_SESSION['messages'] = 'Le produit '.$name.' est bien enregistré !';           

        break;

        case "suprrProduitBdd" :

            deleteProduct($id);

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
                
                foreach ($_SESSION["products"] as $index=>$productInSession) {

                    if ($productInSession['bddId']==$product['id']) {
    
                        return header("location:traitement.php?action=addProduit&id=".$index."");    
                    }    
                }
    
                $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => 1,
                            "bddId"=> $product['id']                      
                    ];                    
        
                $_SESSION['products'][] = $product;

                header("Location:recap.php"); 

                }   

            break;

        case "deleteProductBdd":

            if(isset($_GET['id'])){   
                
                $productDel = deleteProduct($_GET['id']);
            }


            header("Location:admin.php"); 
            break;

}
