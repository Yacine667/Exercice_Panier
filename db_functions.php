<?php

function connect()
{

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

function findAll()
{

    $pdo = connect();
    $sqlQuery = 'SELECT * FROM product';
    $productsStatement = $pdo->prepare($sqlQuery);
    $productsStatement->execute();
    $products = $productsStatement->fetchAll();
    return $products;
}


function findOneById($id)
{

    $pdo = connect();
    $sqlQuery = 'SELECT * FROM product WHERE id = :id';
    $productStatement = $pdo->prepare($sqlQuery);
    // $productStatement->bindValue(":id", $id);
    $productStatement->execute(["id" => $id]);
    $product = $productStatement->fetch();
    return $product;
}


function insertProduct($name, $description, $price)
{

    $pdo = connect();
    $sqlQuery = 'INSERT INTO product(name, description, price) VALUES (:name, :description, :price)';
    $insertProduct = $pdo->prepare($sqlQuery);

    $insertProduct->execute([
        'name' => $name,
        'description' => $description,
        'price' => $price,
    ]);

    return $pdo->lastInsertId();
}

function deleteProduct($id)
{

    $pdo = connect();
    $sqlQuery = $pdo->prepare("DELETE FROM product WHERE id = :id");
    $sqlQuery->bindParam(':id', $id, PDO::PARAM_INT);
    $sqlQuery->execute();
    
}

