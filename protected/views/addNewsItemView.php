<?php
$newsController = new NewsController();
$categories = $newsController->getCategoriesAction();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FRESH NEWS</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<div class="container">
    <? require "common/header.php"; ?>
    <div id="add-news-item-form">
        <label class="form-title">Добавьте новость</label></br>
        <p class="error-msg"><?=!empty($_COOKIE['addNewsItemError']) ? $_COOKIE['addNewsItemError'] : ""; ?></p>
        <form action="/news/add" method="post">
            <label for="title-textarea">Введите заголовок:</label></br>
            <textarea name="title" id="title-textarea" rows="3" required></textarea>
            <label for="category-select">Выберите категорию:</label></br>
            <select name="category" id="category-select">
                <option disabled>Категории</option>
                <?php
                    foreach ($categories as $category){
                        echo "<option value={$category['id_c']}>{$category['name']}</option>";
                    }
                ?>
            </select></br>
            <label for="content-textarea">Добавьте содержание:</label></br>
            <textarea name="content" id="content-textarea" rows="12"></textarea></br>
            <button id="add-news-item-btn" class="submit-btn">Добавить</button>
        </form>
    </div>
    <? require "common/footer.php"; ?>