<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>FRESH NEWS</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <?php
        require "common/header.php";
        ?>
        <div class="news-div">
            <?php
                if (empty($news))
                    echo "<p class='sorry-msg'>К сожалению, пока нет ни одной новости...</p>";
                else{
                    foreach ($news as $newsItem){
                        echo "<div class=\"news-item-div\">
                                <img src='../../img/divider.png' class='news-divider'>
                                <h3 class='news-title'>{$newsItem['title']}</h3>
                                <div id='category-and-datetime'>
                                    <span class='news-category'>Категория: {$newsItem['category']}</span>"
                                    . "<span class='news-datetime'>" . date("d/m/Y H:i", $newsItem['datetime']) . "</span>
                                </div>
                                <p class='news-content'>"
                                . iconv('windows-1251', 'utf-8', mb_substr(iconv('utf-8', 'windows-1251', $newsItem['content']), 0, 300))
                                . "...<a class='news-item-link' href='/news/getItem/{$newsItem['id_n']}'>Читать далее</a>
                                </p>
                                <img src='../../img/divider.png' class='news-divider'>
                              </div>";
                    }
                }
            ?>
        </div>
        <?php
            if (isset($_COOKIE['userData'])) {
                echo "<button class=\"add-news-btn\" onclick=\"onAddNewsClick()\" onmouseover=\"onAddNewsMouseOver()\" onmouseleave=\"onAddNewsMouseLeave()\" >
                                <img src=\"../../../img/addNews.png\" alt=\"Add news item icon\">
                              </button>";
            }
            if (!empty($news)){
                echo "<a href=\"#header\">
                        <button id=\"to-top-btn\" onmouseover=\"onToTopMouseOver()\" onmouseleave=\"onToTopMouseLeave()\">
                            <img src=\"../../../img/toTop.png\" alt=\"to top icon\">
                        </button>
                      </a>";
                $newsController = new NewsController();
                $newsAmount = $newsController->getNewsAmountAction();
                $pagesCount = ceil($newsAmount/10);
                if ($pagesCount > 1){
                    echo "<div class=\"pagination\">
                      <ul class='pagination-ul'>";
                    if ($pagesCount <= 10){
                        for($i = 1; $i <= $pagesCount; $i++){
                            if ($_COOKIE['currentPage'] == $i){
                                echo "<li><a style='border-color: #374E36; color: #374E36;' href='/news/index?page=$i'>$i</a></li>";
                                continue;
                            }
                            echo "<li><a href='/news/index?page=$i'>$i</a></li>";
                        }
                    }
                    else{
                        $decadeNumber = isset($_COOKIE['decadeNumber']) ? $_COOKIE['decadeNumber'] : 1;
                        $prevDecade = ($decadeNumber - 1) * 10 - 9;
                        if ($decadeNumber != 1)
                            echo "<li><a id='prev' href='/news/index?page=$prevDecade' onmouseover='onPrevMouseOver()' 
                                        onmouseleave='onPrevMouseLeave()'><img src=\"../../img/prev.png\"></a></li>";
                        for($i = $decadeNumber * 10 - 9; $i <= $decadeNumber * 10; $i++){
                            if ($_COOKIE['currentPage'] == $i){
                                echo "<li><a style='border-color: #374E36; color: #374E36;' href='/news/index?page=$i'>$i</a></li>";
                                continue;
                            }
                            if ($i > $pagesCount) break;
                            echo "<li><a href='/news/index?page=$i'>$i</a></li>";
                        }
                        if ($pagesCount > $decadeNumber * 10){
                            $nextDecade = $decadeNumber * 10 + 1;
                            echo "<li><a id='next' href='/news/index?page=$nextDecade' onmouseover='onNextMouseOver()' 
                                    onmouseleave='onNextMouseLeave()'><img src=\"../../img/next.png\"></a></li>";
                        }
                    }
                    echo "</ul>
                      </div>";
                }
            }
            require "common/footer.php";
        ?>