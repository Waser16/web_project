<?php
    session_start();
    require('connection.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth_q_text = "SELECT * FROM staff WHERE email = '{$email}' and password = '{$password}'";
    $auth_q = mysqli_query($db, $auth_q_text);

    if (mysqli_num_rows($auth_q) == 1) {
        $mas = mysqli_fetch_array($auth_q);
        $_SESSION['is_auth'] = 'true';
        $_SESSION['user'] = [   
        'id' => $mas['id'],
        'login' => $mas['login'],
        'email' => $mas['email'],
        'login' => $mas['login'],
        'position' => $mas['position']
        ];
        header("Location: index.php");
    } 
    else {
        $_SESSION['is_auth'] = 'Проверьте введенные данные';
        header("Location: autherization.php");
    }

?>