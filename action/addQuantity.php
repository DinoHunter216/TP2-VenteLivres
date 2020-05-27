<?php
    require "../includes/config.inc.php";
    require "../includes/functions.inc.php";
    require "../classes/Panier.class.php";

    session_start();

    if (isset($_POST['id'])) {
        $numberOfItem = getNumberOfTimesItemIsInCart($_POST['id']);
        if ($_GET['quantiteMax'] > $numberOfItem) {
            for ($i = 0; $i < $_POST['quantity']; $i++) {
                addItemToCart($_POST['id']);
            }
        }
    }
    redirect("panier");
