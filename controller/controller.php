<?php

session_start();

include "model/model.php";

$view = isset($_GET["view"]) ? $_GET["view"] : "main";

if (isset($_GET["exit"])) {
    exitProfile();
}

switch ($view) {
    case "main":
        $title = "МастерОК - ремонт квартир и загородных домов";
        $orders = getLastOrders();
        $counter = getCount();

        if (isset($_POST["checkLogin"])) {
            $res = checkLogin();
            echo $res;
            die();
        }
        if (isset($_POST["authLogin"])) {
            $res = auth();
            echo $res;
            die();
        }
        if (isset($_POST["regPass"])) {
            reg();
            header("Location: /profile");
        }
        if (isset($_POST["counter"])) {
            $res = getCount();
            echo $res;
            die();
        }
        break;
    case "profile":
        $title = "Личный кабинет: МастерОК - ремонт квартир и загородных домов";
        $orders = getUserOrders();

        if (isset($_POST["address"])) {
            $res = addOrder();
            header("Location: /profile");
        }
        if (isset($_POST["delOrderId"])) {
            delOrder();
            header("Location: /profile");
        }
        if (empty($_SESSION["id"])) {
            header("Location: /");
        }
        if ($_SESSION["adm"] == 1) {
            header("Location: /master");
        }
        break;
    case "master":
        $title = "Панель управления: МастерОК - ремонт квартир и загородных домов";
        $orders = getAllOrders();
        $allCats = getCats();

        if ($_SESSION["adm"] != 1) {
            header("Location: /profile");
        }
        if (isset($_POST["newStat"])) {
            $res = editOrder();
            header("Location: /profile");
        }
        if (isset($_POST["catName"])) {
            addCat();
            header("Location: /profile");
        }
        if (isset($_POST["delCatId"])) {
            delCat();
            header("Location: /profile");
        }
        break;
}

include "views/index.php";
