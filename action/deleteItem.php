<?php
    require "../includes/config.inc.php";
    require "../includes/functions.inc.php";

    session_start();
    if (isset($_POST['item'])) {
        $index = array_search($_POST['item'], $_SESSION['cartArray']);
        unset($_SESSION['cartArray'][$index]);
    }
    redirect("panier");
