<?php
class NewsModel{

    public function getCategories(){
        $link = PDOConnection::getInstance()->getConnection();
        $sql = "SELECT * FROM categories ORDER BY name";
        $categories = $link->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    
    public function addNewsItem(array $data){
        $link = PDOConnection::getInstance()->getConnection();
        $sql = "INSERT INTO news(title, content, id_u, id_c, datetime)
                VALUES(:title, :content, :id_u, :id_c, :datetime)";
        $stmt = $link->prepare($sql);
        return $stmt->execute($data);
    }

    public function getAllNews($offset){
        $link = PDOConnection::getInstance()->getConnection();
        $sql = "SELECT id_n, title, content, datetime, categories.name AS category
                FROM news
                INNER JOIN categories
                ON news.id_c = categories.id_c
                ORDER BY datetime
                LIMIT 10 OFFSET $offset";
        $news = $link->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $news;
    }

    public function getNewsItemById($id){
        $link = PDOConnection::getInstance()->getConnection();
        $sql = "SELECT id_n, title, content, datetime, 
                      users.name AS user_name, users.email AS user_email, categories.name AS category
                FROM news
                INNER JOIN users
                INNER JOIN categories
                ON news.id_u = users.id_u
                AND news.id_c = categories.id_c
                WHERE id_n = $id";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $newsItem = $stmt->fetch(PDO::FETCH_ASSOC);
        return $newsItem;
    }

    public function getNewsAmount(){
        $link = PDOConnection::getInstance()->getConnection();
        $sql = "SELECT COUNT(*) AS news_amount FROM news";
        $newsAmount = $link->query($sql)->fetch(PDO::FETCH_ASSOC)['news_amount'];
        return $newsAmount;
    }
}