<?php
    session_start();
    #unset($_SESSION['user']);
    require('connection.php');
    #echo print_r($_SESSION['user']);
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <title>Main</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>

    <!-- ХЕДЕР -->
    <?php
        require('header.php')
    ?>

    <!-- Основная часть сайта-->
    <div class="container">
        <div class="content row">
            <!-- часть с новостями-->
            <div class="content-post col-8">
                <h4> Последние публикации</h4>
                <?php
                    require('connection.php');
                    $posts_q_text = "SELECT p.image_path, p.id, p.title,
                                            p.post_date, s.first_name,
                                            s.last_name 
                                       FROM posts p
                                            JOIN staff s on p.author = s.id 
                                      ORDER BY post_date DESC 
                                      LIMIT 20";
                    $posts_q = mysqli_query($db, $posts_q_text);

                    while ($mas = mysqli_fetch_array($posts_q)) {
                        printf("<div class='post row'>
                            <div class='post-image col-2'>
                                <img class='mx-auto d-block' src='%s_rr.jpg'}'>
                            </div>
                            <div class='post-text col-10'>
                                <h5>
                                    <a href='post.php?post_id=%s'>
                                        %s
                                    </a>
                                </h5>
                                <p>%s %s | %s</p>
                            </div>
                        </div>
                    ", $mas['image_path'], $mas['id'], $mas['title'], $mas['first_name'],
                        $mas['last_name'], $mas['post_date']);
                    }

                ?>
            </div>
            <!-- часть с важными новостями-->
            <div class="content-important col-4">
                <h4>Важные новости</h4>
                <?php
                    require('connection.php');
                    $important_posts_q_text = "SELECT *
                                                FROM posts 
                                                WHERE important = 1
                                                ORDER BY post_date DESC 
                                                LIMIT 3";
                    $important_posts_q = mysqli_query($db, $important_posts_q_text);
                    while ($mas = mysqli_fetch_array($important_posts_q)) {
                        printf(
                            "<div class='important row'>
                                <a href='post.php?post_id=%s'>
                                    %s
                                </a>
                            </div>    
                            ", $mas['id'], $mas['title']);
                        }
                ?>
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