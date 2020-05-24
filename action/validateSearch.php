<?php
    require "../includes/config.inc.php";
    require "../includes/functions.inc.php";
    require "../classes/Produit.class.php";
    require DOCROOT."/includes/head.inc.php";
    require DOCROOT."/includes/header.inc.php";

    if (isset($_POST['search'])) {
        $product = productExist($_POST['search']);
        if ($product != null) {
            showProduct($product);
        } else {
            echo "Aucun produit correspondant";
        }
    }

    require DOCROOT."/includes/javascript.inc.php";
