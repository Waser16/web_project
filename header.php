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
                        <?php
                            if (!$_SESSION['user']) {
                                echo "<li>
                                        <a href='autherization.php'>Войти</a>
                                    </li>";
                            }
                            else {
                                echo "<li>
                                        <a href='#'>Админ панель</a>
                                    </li>";

                                echo "<li>
                                        <a href='logout.php'>Выйти</a>
                                    </li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>