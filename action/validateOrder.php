<?php
    require "../includes/config.inc.php";
    require "../includes/functions.inc.php";
    require "../classes/Client.class.php";
    require "../classes/Panier.class.php";
    require "../classes/Commande.class.php";

    if (isset($_POST['payment'])) {
        createOrder($_POST['payment']);
    }
