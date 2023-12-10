<?php
    session_start();
    require('connection.php');
    if ($_SESSION['user']) {
        header("Location: index.php");
    }
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
    <link rel="stylesheet" href="css/autherization.css">
    <title>Чемпионат</title>
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
    <div class="container-fluid">
        <div class="content container">
            <div class="row"> 
                <div class="left-space col-4">
                </div>
                <div class="registration-form-containter col-4">
                    <form class="registration-form" method="POST" action="autherization_check.php">
                        <label>Логин</label><br>
                        <input id="register-input" name='email' type="text" placeholder="example@mail.ru"><br>
                        <label>Пароль</label><br>
                        <input id="register-input" name='password' type="password" placeholder="Ваш пароль"><br>
                        <input id="submit-input" type="submit" value="Войти"> 
                        <p>
                            Нет аккаунта? <a href="registration.php">Регистрация</a>
                        </p>
                        <?php
                            echo $_SESSION['user'];
                        ?>
                    </form>
                </div>
                <div class="right-space col-4">
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
                    <p>galart82003@gmail.com</p>
                    <p>+79279691214</p>
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