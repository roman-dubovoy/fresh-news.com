<?php
class NewsController{

    public function indexAction(){
        $page = func_get_arg(0)['page'];
        setcookie("currentPage", $page, time() + 3600, "/");
        $decadeNumber = $page%10 == 0 ? $page/10 : (int)(($page + 10) / 10);
        setcookie("decadeNumber", $decadeNumber, time() + 3600, "/");
        if ($_COOKIE['currentPage'] != $page)
            header("Location: " . $_SERVER['REQUEST_URI']);
        if (isset($_COOKIE['authError']))
            setcookie("authError", "Неверный e-mail или пароль!", 1, "/");
        if (isset($_COOKIE['regError']))
            setcookie("regError", "Пользователь с таким e-mail уже существует!", 1, "/");
        $offset =  $page * 10 - 10;
        $newsModel = new NewsModel();
        $news = $newsModel->getAllNews($offset);
        require "protected/views/indexView.php";
    }

    public function getCategoriesAction(){
        $newsModel = new NewsModel();
        $categories = $newsModel->getCategories();
        if (!empty($categories))
            return $categories;
        else
            return null;
    }
    
    public function addAction(){
        if (!empty($_COOKIE['userData'])){
            $user = unserialize(base64_decode($_COOKIE['userData']));
            $userModel = new UserModel();
            if ($userModel->getUserByEmailPassword(['email' => $user['email'], 'password' => $user['password']])){
                if ($_SERVER['REQUEST_METHOD'] == 'GET')
                    setcookie("addNewsItemError", "При добавлении новости произошла ошибка!", 1, "/");
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $newsItemData = [
                        'title' => strip_tags(trim($_POST['title'])),
                        'content' => strip_tags(trim($_POST['content'])),
                        'id_u' => unserialize(base64_decode($_COOKIE['userData']))['id_u'],
                        'id_c' => strip_tags(trim($_POST['category'])),
                        'datetime' => time()
                    ];

                    foreach ($newsItemData as $key=>$value){
                        if (empty($value))
                            http_response_code(400);
                    }

                    $newsModel = new NewsModel();
                    if ($newsModel->addNewsItem($newsItemData)){
                            setcookie("addNewsItemError", "При добавлении новости произошла ошибка!", 1, "/");
                        header("Location: /news/add");
                        exit();
                    }
                    else{
                        setcookie("addNewsItemError", "При добавлении новости произошла ошибка!", time()+3600, "/");
                        header("Location: /news/add");
                        exit();
                    }
                }
                require "protected/views/addNewsItemView.php";
            }
            else{
                header("Location: /user/auth");
                exit();
            }
        }
        else{
            header("Location: /user/auth");
            exit();
        }
    }
    
    public function getItemAction(){
        $id = func_get_arg(0)[0];
        if (!isset($id)) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
        $newsModel = new NewsModel();
        $newsItem = $newsModel->getNewsItemById($id);
        if (!empty($newsItem))
            require "protected/views/newsItemView.php";
        else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function getNewsAmountAction(){
        $newsModel = new NewsModel();
        return (int)$newsModel->getNewsAmount();
    }
}