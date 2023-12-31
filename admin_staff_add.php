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
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css/admin_staff_add.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <title>Main</title>
</head>

<body>
    <!-- ХЕДЕР -->
    <?php
        require('header.php')
    ?>

    <!-- Основная часть сайта-->
    <div class="main-fluid container-fluid">
        <div class="main-container container">
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
                                <input name="last-name" type="text"></input>
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
                                <input type="submit" value="Добавить сотрудника">
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
                                    </p>
                                </div>    
                                ", $mas['last_name'], $mas['first_name'], $mas['cnt'], $mas['latest_post']);
                            }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        require('footer.php');
    ?>


</body>

</html>