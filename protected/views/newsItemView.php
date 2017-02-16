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
    <div class="one-news-item-div">
        <h3 class='news-title'><?=$newsItem['title'];?></h3>
        <span class='news-category'>Категория: <?=$newsItem['category'];?></span>
        <span class='news-datetime'><?=date("d/m/Y H:i", $newsItem['datetime']);?></span>
        <p class='news-content'>
            <?=$newsItem['content'];?>
        </p>
        <p class="author">Автор: <?=$newsItem['user_name'];?></p>
        <p class="connect-with-author">Связаться с автором: <?=$newsItem['user_email'];?></p>
    </div>
    <a href="#header">
        <button id="to-top-btn" onmouseover="onToTopMouseOver()" onmouseleave="onToTopMouseLeave()">
            <img src="../../../img/toTop.png" alt="to top icon">
        </button>
    </a>
    <? require "common/footer.php"; ?>
