<?php
class UserController{

    public function indexAction(){
        require "protected/views/authView.php";
    }

    public function regAction(){
        if (isset($_COOKIE['authError']))
            setcookie("authError", "Неверный e-mail или пароль!", 1, "/");
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            setcookie("regError", "Пользователь с таким e-mail уже существует!", 1, "/");
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $userData = [
                'name' => strip_tags(trim($_POST['name'])),
                'email' => strip_tags(trim($_POST['email'])),
                'password' => hash("sha256",strip_tags(trim($_POST['password']))),
                'reg_datetime' => time()
            ];

            foreach ($userData as $key=>$value){
                if (empty($value))
                    http_response_code(400);
            }

            $userModel = new UserModel();
            if ($userModel->isUserExistByEmail($userData['email'])){
                http_response_code(403);
                setcookie("regError", "Пользователь с таким e-mail уже существует!", time()+3600, "/");
                header("Location: /user/reg");
                exit();
            }
            else
                if ($userModel->addUser($userData)){
                    setcookie("regError", "Пользователь с таким e-mail уже существует!", 1, "/");
                    header("Location: /user/auth");
                    exit();
                }
        }
        require "protected/views/regView.php";
    }

    public function authAction(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            setcookie("authError", "Неверный e-mail или пароль!", 1, "/");
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $userData = [
                'email' => strip_tags(trim($_POST['email'])),
                'password' => hash("sha256",strip_tags(trim($_POST['password'])))
            ];

            foreach ($userData as $key=>$value){
                if (empty($value)) {
                    http_response_code(400);
                }
            }
            
            $userModel = new UserModel();
            if ($userModel->isUserExistByEmail($userData['email'])){
                $user = $userModel->getUserByEmailPassword($userData);
                if (!empty($user)){
                    setcookie("userData", base64_encode(serialize($user)), time()+3600, "/");
                    setcookie("authError", "Неверный e-mail или пароль!", 1, "/");
                    header("Location: /news");
                    exit();
                }
                else{
                    http_response_code(401);
                    setcookie("authError", "Неверный e-mail или пароль!", time()+3600, "/");
                    header("Location: /user/auth");
                    exit();
                }
            }
            else{
                setcookie("authError", "Неверный e-mail или пароль!", time()+3600, "/");
                header("Location: /user/auth");
                exit();
            }
        }
        require "protected/views/authView.php";
    }

    public function logoutAction(){
        setcookie("userData", $_COOKIE['userData'], 1, "/");
        setcookie("authError", "Неверный e-mail или пароль!", 1, "/");
        setcookie("regError", "Пользователь с таким e-mail уже существует!", 1, "/");
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}