<?php
    require "../includes/config.inc.php";
    require "../includes/functions.inc.php";
    require "../classes/Client.class.php";
    require "../classes/Panier.class.php";
    require "../classes/Commande.class.php";
    require "../classes/Produit.class.php";


    session_start();
    if (isset($_POST['payment'])) {
        $orderId = createOrder($_POST['payment']);
        createBill();
        removeQuantities();
        emptyCart();
    }
    // redirect("facture");
