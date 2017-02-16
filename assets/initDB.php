<?php
require_once "settings.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/protected/library/PDOConnection.class.php";

try {
    //localhost must be changed real to host before deployment!!!
    $connection = new PDO("mysql:host=fresh-news.com", DB_USERNAME, DB_PASSWORD);
    $connection->exec("CREATE DATABASE IF NOT EXISTS `fresh-news.com`");
} catch (PDOException $e) {
    echo $e->getCode() . ": " . $e->getMessage();
    exit();
}

//Connect
try {
    $link = PDOConnection::getInstance()->getConnection();
} catch (PDOException $e) {
    echo $e->getCode() . ": " . $e->getMessage();
    exit();
}

//Users
$sql = "CREATE TABLE IF NOT EXISTS `users`
(id_u INT(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(150) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(200) NOT NULL,
reg_datetime INT(11) NOT NULL,
PRIMARY KEY(id_u),
UNIQUE(email))";
try{
    $link->exec($sql);
    if (!empty($link->errorInfo()[1]))
        print_r($link->errorInfo());
}catch (PDOException $e){
    echo $e->getCode() . ": " . $e->getMessage();
    exit();
}

//News categories
$sql = "CREATE TABLE IF NOT EXISTS `categories`
(id_c INT(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(150) NOT NULL,
PRIMARY KEY(id_c),
UNIQUE(name))";
try{
    $link->exec($sql);
    if (!empty($link->errorInfo()[1]))
        print_r($link->errorInfo());
}catch (PDOException $e){
    echo $e->getCode() . ": " . $e->getMessage();
    exit();
}

$sql = "SELECT COUNT(id_c) as categories_count FROM categories";
$categoriesCount = $link->query($sql)->fetch(PDO::FETCH_ASSOC)['categories_count'];
if ($categoriesCount == 0){
    $sql = "INSERT INTO categories(name)
    VALUES('Политика'), ('Экономика'), ('Общество'), ('Технологии'), 
    ('Наука'), ('Авто'), ('Спорт'), ('Здоровье'), ('За границей'), ('Шоу-бизнес'), ('События')";
    try{
        $link->exec($sql);
        if (!empty($link->errorInfo()[1])){
            print_r($link->errorInfo());
        }
    }catch (PDOException $e){
        echo $e->getCode() . ": " . $e->getMessage();
        exit();
    }
}

//News
$sql = "CREATE TABLE IF NOT EXISTS `news`
(id_n INT(11) NOT NULL AUTO_INCREMENT,
title VARCHAR(250) NOT NULL,
content TEXT NOT NULL,
id_u INT(11) NOT NULL,
id_c INT(11) NOT NULL,
datetime INT(11) NOT NULL
PRIMARY KEY(id_n))";
try{
    $link->exec($sql);
    if (!empty($link->errorInfo()[1]))
        print_r($link->errorInfo());
}catch (PDOException $e){
    echo $e->getCode() . ": " . $e->getMessage();
    exit();
}