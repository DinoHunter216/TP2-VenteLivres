<?php
    require "../includes/config.inc.php";
    require "../includes/functions.inc.php";
    require "../classes/Panier.class.php";

    session_start();

    if (isset($_POST['cart'])) {
        addItemToCart($_POST['cart']);
        echo getNumberOfItems();
    }
    redirect("panier");
