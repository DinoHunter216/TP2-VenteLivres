<?php
    require "../includes/config.inc.php";
    require "../includes/functions.inc.php";
    require "../classes/Client.class.php";
    require "../classes/Panier.class.php";

    session_start();

    if (isset($_POST['cart'])) {
        if (isset($_SESSION['cartExists'])) {
            addItemToCart($_POST['cart']);
        } else {
            createCart();
        }
    }
