<?php
    define("SITEURL", $_SERVER["HTTP_HOST"]);
    define("SITESTATE", "prod"); //prod ou dev

    // Le SITETITLE est dans chaque page
    define("SITEDESC", "");
    define("SITEOWNER", "Jérémy Dumas");

    // Section pour ma bd
    define("DBNAME", "ecommerce");
    define("DBUSERNAME", "webphp");
    define("DBPASSWORD", "qwerty123");

    define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

    // Section pour l'affiche des livres
    define('FIRST_BOOK', 3);
    define('LAST_BOOK', 11);
