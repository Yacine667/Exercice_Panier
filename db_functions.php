<?php 

function connect(){

    $pdo = new \PDO(
        'mysql:dbname=store;host=127.0.0.1',
        'root',
        'root',
        [
            \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]
        );
}

function findAll (){

    $pdo = new \PDO(
        'mysql:dbname=store;host=127.0.0.1',
        'root',
        'root',
        [
            \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]
        );
    $sqlQuery = 'SELECT * FROM product';
    $productsStatement = $pdo->prepare($sqlQuery);
    $productsStatement->execute();
    $products = $productsStatement->fetchAll();
    
    foreach ($products as $product) {
    ?>
        <p><?php echo $product['name']; ?></p>
    <?php
    }
    }

    



function findOneById($id) {

    $pdo = new \PDO(
        'mysql:dbname=store;host=127.0.0.1',
        'root',
        'root',
        [
            \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]
        );

        $sqlQuery = 'SELECT * FROM product WHERE id = : id';
        $productsStatement = $pdo->prepare($sqlQuery);
        $productsStatement->execute(["id" => $id]);
        $products = $productsStatement->fetch();
        
        
        ?>
            <p><?php echo $products; ?></p>
        <?php
        }
        
    
        


function insertProduct($name, $descr ,$price) {

    $pdo = new \PDO(
        'mysql:dbname=store;host=127.0.0.1',
        'root',
        'root',
        [
            \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]
        );

$sqlQuery = 'INSERT INTO products(name, descr, price, is_enabled) VALUES (:name, :descr, :price, :is_enabled)';

$insertProduct = $mysqlClient->prepare($sqlQuery);

$insertProduct->execute([
    'name' => '$name',
    'descr' => '$descr',
    'price' => '$price',
    'is_enabled' => 1
]);


}

?>