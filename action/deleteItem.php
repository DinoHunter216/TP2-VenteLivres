<?php
    require "../includes/config.inc.php";
    require "../includes/functions.inc.php";

    session_start();
    if (isset($_POST['item'])) {
        deleteItemFromCart($_POST['item']);
    }
    redirect("panier");
