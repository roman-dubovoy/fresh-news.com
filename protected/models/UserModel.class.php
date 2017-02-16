<?php
class UserModel{

    public function addUser(array $data){
        $link = PDOConnection::getInstance()->getConnection();
        $sql = "INSERT INTO users(name, email, password, reg_datetime)
                VALUES(:name, :email, :password, :reg_datetime)";
        $stmt = $link->prepare($sql);
        return $stmt->execute($data);
    }

    public function isUserExistByEmail($email){
        $link = PDOConnection::getInstance()->getConnection();
        $sql = "SELECT id_u
                FROM users
                WHERE email = ?";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return !empty($user['id_u']);
    }

    public function getUserByEmailPassword(array $data){
        $link = PDOConnection::getInstance()->getConnection();
        $sql = "SELECT id_u, name, email, password
                FROM users
                WHERE email = :email AND password = :password";
        $stmt = $link->prepare($sql);
        $stmt->execute($data);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}