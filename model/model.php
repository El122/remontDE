<?php

function clear($val)
{
    return trim(strip_tags(htmlspecialchars($val)));
}

function checkLogin()
{
    global $conn;

    $login = clear($_POST["checkLogin"]);

    $res = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE u_login = '{$login}'"));
    if ($res > 0) {
        return false;
    } else {
        return true;
    }
}

function auth()
{
    global $conn;

    $login = clear($_POST["authLogin"]);
    $pass = md5(clear($_POST["authPass"]));

    $res = mysqli_query($conn, "SELECT * FROM users WHERE u_login = '{$login}' AND u_pass = '{$pass}';");
    if (mysqli_num_rows($res) > 0) {
        $res = mysqli_fetch_assoc($res);
        $_SESSION["id"] = $res["u_id"];
        $_SESSION["fio"] = $res["u_fio"];
        $_SESSION["adm"] = $res["u_isAdm"];

        return true;
    } else {
        return false;
    }
}

function exitProfile()
{
    unset($_SESSION["id"]);
    unset($_SESSION["fio"]);
    unset($_SESSION["adm"]);
}

function reg()
{
    global $conn;
    $login = clear($_POST["regLogin"]);
    $fio = clear($_POST["regfio"]);
    $email = clear($_POST["regEmail"]);
    $pass = md5(clear($_POST["regPass"]));

    mysqli_query($conn, "INSERT INTO users(u_login, u_fio, u_email, u_pass) VALUES ('{$login}', '{$fio}', '{$email}', '{$pass}');");

    $res = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE u_login = '{$login}' AND u_pass = '{$pass}';"));

    $_SESSION["id"] = $res["u_id"];
    $_SESSION["fio"] = $res["u_fio"];
    $_SESSION["adm"] = $res["u_isAdm"];
}

function addOrder()
{
    global $conn;
    $address = clear($_POST["address"]);
    $desc = clear($_POST["desc"]);
    $cat = clear($_POST["cat"]);
    $maxPrice = clear($_POST["maxPrice"]);

    if (!empty($_FILES)) {
        if ($_FILES["photo"]["size"] <= 2097152) {
            if (($_FILES["photo"]["type"] == "image/jpg") || ($_FILES["photo"]["type"] == "image/jpeg") || ($_FILES["photo"]["type"] == "image/png") || ($_FILES["photo"]["type"] == "image/bmp")) {
                $upDir = "views/assets/uploadFiles/photoBefore/";
                $upFile = $upDir . basename($_FILES["photo"]["name"]);
                move_uploaded_file($_FILES["photo"]["tmp_name"], $upFile);
                mysqli_query($conn, "
                INSERT INTO orders(o_address, o_desc, o_cat, o_maxPrice, o_photoBefore, o_user, o_date) 
                VALUES ('{$address}','{$desc}','{$cat}','{$maxPrice}','{$_FILES['photo']['name']}','{$_SESSION['id']}', NOW());");
            }
        }
    }
}

function getLastOrders()
{
    global $conn;

    $res = mysqli_query($conn, "SELECT * FROM orders INNER JOIN cats ON o_cat = c_id WHERE o_stat = 'Отремонтировано' ORDER BY o_date DESC, o_id DESC LIMIT 4");
    return $res;
}

function getUserOrders()
{
    global $conn;

    $res = mysqli_query($conn, "SELECT * FROM orders INNER JOIN cats ON o_cat = c_id WHERE o_user = '{$_SESSION['id']}' ORDER BY o_date DESC, o_id DESC");
    return $res;
}

function getAllOrders()
{
    global $conn;

    $res = mysqli_query($conn, "SELECT * FROM orders INNER JOIN cats ON o_cat = c_id ORDER BY o_date DESC, o_id DESC");
    return $res;
}

function setStat($stat)
{
    switch ($stat) {
        case "Новая":
            return "newOrder";
        case "Ремонтируется":
            return "nowOrder";
        case "Отремонтировано":
            return "finishedOrder";
    }
}

function delOrder()
{
    global $conn;
    $orderId = clear($_POST["delOrderId"]);
    mysqli_query($conn, "DELETE FROM orders WHERE o_id = '{$orderId}';");
}

function delCat()
{
    global $conn;
    $orderId = clear($_POST["delCatId"]);
    mysqli_query($conn, "DELETE FROM cats WHERE c_id = '{$orderId}';");
}

function getCount()
{
    global $conn;
    $res = mysqli_query($conn, "SELECT * FROM orders WHERE o_stat = 'Отремонтировано';");
    return mysqli_num_rows($res);
}

function editOrder()
{
    global $conn;
    $id = clear($_POST["editOrderId"]);
    $newCat = clear($_POST["newCat"]);
    $newStat = clear($_POST["newStat"]);
    $finishedPrice = clear($_POST["finishedPrice"]);

    mysqli_query($conn, "
    UPDATE orders
    SET o_stat = '{$newStat}',
    o_cat = '{$newCat}'
    WHERE o_id = '{$id}';");

    if (empty($_FILES)) {
        mysqli_query($conn, "
    UPDATE orders
    SET o_finishPrice = '{$finishedPrice}'
    WHERE o_id = '{$id}';");
    }
    if (!empty($_FILES)) {
        if ($_FILES["finishedPhoto"]["size"] <= 2097152) {
            if (($_FILES["finishedPhoto"]["type"] == "image/jpg") || ($_FILES["finishedPhoto"]["type"] == "image/jpeg") || ($_FILES["finishedPhoto"]["type"] == "image/png") || ($_FILES["finishedPhoto"]["type"] == "image/bmp")) {
                $upDir = "views/assets/uploadFiles/photoAfter/";
                $upFile = $upDir . basename($_FILES["finishedPhoto"]["name"]);
                move_uploaded_file($_FILES["finishedPhoto"]["tmp_name"], $upFile);
                mysqli_query($conn, "
                UPDATE orders SET o_photoAfter = '{$_FILES['finishedPhoto']['name']}' WHERE o_id = '{$id}';");
            }
        }
    }
}

function getCats()
{
    global $conn;
    $res = mysqli_query($conn, "SELECT * FROM cats;");
    return $res;
}

function getOrdersCount($id)
{
    global $conn;
    $res = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM orders WHERE o_cat = '{$id}' GROUP BY o_cat;"))["count"];
    if (empty($res)) {
        return 0;
    }
    return $res;
}

function addCat()
{
    global $conn;
    $catName = clear($_POST["catName"]);
    mysqli_query($conn, "INSERT INTO cats(c_name) VALUES('{$catName}')");
}