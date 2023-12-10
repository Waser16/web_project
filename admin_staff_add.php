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
    <link rel="stylesheet" href="css/admin_staff_add.css" type="text/css">
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
            <div class="create col-8">
                <h4>Добавление сотрудника</h4>
                <form method="POST" action="admin_staff_add_check.php">
                    <div class='field-name row'>
                        <div class='left-part col-2'>
                            <p>Фамилия:</p>
                        </div>
                        <div class='input-part col-10'>
                            <input name="last-name" type="text" class="post-title-input"></input>
                        </div>
                    </div>
                    <div class='field-name row'>
                        <div class='left-part col-2'>
                            <p>Имя:</p>
                        </div>
                        <div class='input-part col-10'>
                            <input type="text" name="first-name">
                        </div>
                    </div>
                    <div class='field-name row'>
                        <div class='left-part col-2'>
                            <p>Логин:</p>
                        </div>
                        <div class='input-part col-10'>
                            <input type="text" name="login">
                        </div>
                    </div>
                    <div class='field-name row'>
                        <div class='left-part col-2'>
                            <p>Пароль:</p>
                        </div>
                        <div class='input-part col-10'>
                            <input type="text" name="password">
                        </div>
                    </div>
                    <div class='field-name row'>
                        <div class='left-part col-2'>
                            <p>Email:</p>
                        </div>
                        <div class='input-part col-10'>
                            <input type="text" name="email">
                        </div>
                    </div>
                    <div class='field-name row'>
                        <div class='left-part col-2'>
                            <p>Должность:</p>
                        </div>
                        <div class='input-part col-10'>
                            <input type="text" name="position">
                        </div>
                    </div>
                    <div class='field-name row'>
                        <div class="left-part col-2"></div>
                        <div class="input-part col-10">
                            <input class="post-submit" type="submit" value="Добавить сотрудника">
                        </div>
                    </div>
                </form>
            </div>
            <!-- профиль автора-->
            <div class="content-important col-4">
                <h4>Профиль</h4>
                <?php
                    require('connection.php');
                    $author_profile_q_text = "SELECT COUNT(*) AS cnt,
                                                MAX(post_date) as latest_post,
                                                s.last_name, s.first_name
                                                FROM posts p
                                                    JOIN staff s on p.author = s.id
                                                WHERE author = '{$_SESSION['user']['id']}'
                                                ";
                    $author_profile_q = mysqli_query($db, $author_profile_q_text);
                    while ($mas = mysqli_fetch_array($author_profile_q)) {
                        printf(
                            "<div class='important row'>
                                <p>
                                    %s %s <br>
                                    Статей: %s <br>
                                    Дата последней статьи: %s <br>
                                    <a href='admin_create.php'>Добавить статью</a> 
                                </p>
                            </div>    
                            ", $mas['last_name'], $mas['first_name'], $mas['cnt'], $mas['latest_post']);
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