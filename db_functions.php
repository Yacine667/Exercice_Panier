<?php 

function connect(){

    $pdo = new \PDO(
        'mysql:dbname=store;host=127.0.0.1',
        'root',
        '',
        [
            \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]
        );
        return $pdo;
}

function findAll (){

    $pdo = connect();
    $sqlQuery = 'SELECT * FROM product';
    $productsStatement = $pdo->prepare($sqlQuery);
    $productsStatement->execute();
    $products = $productsStatement->fetchAll();
    return $products;
 
    }

    



function findOneById($id) {

        $pdo = connect();
        $sqlQuery = 'SELECT * FROM product WHERE id =  :id';
        $productStatement = $pdo->prepare($sqlQuery);
        $productStatement->bindValue(":id", $id);
        $productStatement->execute();
        $product = $productStatement->fetch();        
        return $product; 
    }
        
    
        


function insertProduct($name, $descr ,$price) {

    $pdo = connect();
    $sqlQuery = 'INSERT INTO product(name, descr, price, is_enabled) VALUES (:name, :descr, :price, :is_enabled)';
    $insertProduct = $pdo->prepare($sqlQuery);

    $insertProduct->execute([
        'name' => '$name',
        'descr' => '$description',
        'price' => '$price',
        'is_enabled' => 1
    ]);

    }

?>