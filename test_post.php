<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/post.css">
    <title>Post</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>

    <!-- ХЕДЕР -->
    <header class="container-fluid">
        <div class="container">
            <div class="header row">
                <div class="header-icon col-2">
                    <h3>Placeholder</h3>
                </div>
                <div class="header-menu col-10">
                    <ul>
                        <li>
                            <a href="index.php">Главная</a>
                        </li>
                        <li>
                            <a href="championship.php">Календарь</a>
                        </li>
                        <li>
                            <a href="teams.php">Команды</a>
                        </li>
                        <li>
                            <a href="autherization.php">Войти</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Основная часть сайта-->
    <div class="container">
        <div class="content row">
            <!-- часть с новостями-->
            <div class="content-post col-8">
            <?php
                require('connection.php');
                $post_id = $_GET['post_id'];
                $post_q_text = "SELECT * 
                             FROM posts p
                                  JOIN staff s on p.author = s.id
                             WHERE p.id = '{$post_id}'";
                $post_q = mysqli_query($db, $post_q_text);
                $mas = mysqli_fetch_array($post_q);
                #$vd = var_dump($mas);
                #echo "<pre> . {$vd} . </pre>";
                printf("<h4>%s</h4>
                <p> %s %s | %s</p>
                <div class='post row'>
                    <div class='post-image img-fluid'>
                        <img src='%s.jpg'>
                    </div>
                    <div class='post-text'>
                        %s
                    </div>
                </div>
            ", $mas['title'], $mas['first_name'], $mas['last_name'], $mas['post_date'], 
                    $mas['image_path'], $mas['post_text']);
            ?>
            </div>
            <!-- часть с ВАЖНЫМИ новостями-->
            <div class="content-important col-4">
                <h4>Важные новости</h4>
                <div class="important row">
                    <p>Нерешенные вопросы, оставшиеся от ненужной саги FIA / Wolff</p>
                </div>
                <div class="important row">
                    <p>Как новый дизайн кокпита Формулы-1 поможет избежать проблем с жарой в Катаре</p>
                </div>
                <div class="important row">
                    <p>FIA формализует запрет на аэротестирование Формулы-1 в 2026 году</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-fluid container-fluid">
        <div class="footer-container container">
            <div class="footer-content row">
                <div class="footer-other-series col-4">
                    <h4>Другие серии</h4>
                    <p>GT3</p>
                    <p>WEC</p>
                </div>
                <div class="footer-contacts col-4">
                    <h4>Связаться с нами</h4>
                    <p>GT3</p>
                    <p>WEC</p>
                </div>
                <div class="footer-policy col-4">
                    <h4>Правила использования сайта</h4>
                    <p>Политика конфиденциальности</p>
                    <p>Настройки cookie</p>
                </div>
            </div>
        </div>
    </footer>


</body>

</html>