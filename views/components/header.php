<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
    <link rel="stylesheet" href="<?= $PATH ?>css/style.css">
    <link rel="stylesheet" href="<?= $PATH ?>css/modal.css">
    <link rel="stylesheet" href="<?= $PATH ?>css/fonts.css">
</head>

<body>

    <header>
        <div class="container">
            <a href="/" class="logo">
                МастерОК
            </a>
            <nav>
                <a href="/">Главная</a>
                <?php if (empty($_SESSION["id"])) : ?>
                <button onclick="openModal('authModal')">Войти</button>
                <button onclick="openModal('regModal')">Зарегистрироваться</button>
                <?php else : ?>
                <?php if ($_SESSION["adm"] == 1) : ?>
                <a href="/master">Панель управления</a>
                <?php else : ?>
                <a href="/profile">Личный кабинет</a>
                <?php endif; ?>
                <a href="/?exit">Выйти</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>