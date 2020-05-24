<?php
    define("SITEURL", $_SERVER["HTTP_HOST"]);
    define("SITESTATE", "dev"); //prod ou dev

    // Le SITETITLE est dans chaque page
    define("SITEDESC", "");
    define("SITEOWNER", "Jérémy Dumas");

    ///section pour ma bd
    define("DBNAME", "ecommerce");
    define("DBUSERNAME", "webphp");
    define("DBPASSWORD", "qwerty123");

    define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);
