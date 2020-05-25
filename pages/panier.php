<!doctype html>
<html class="no-js" lang="">

<?php
    define("SITETITLE", "| Accueil");
    require DOCROOT."/includes/head.inc.php";
?>

<body class="bg-light">
    <?php
        require DOCROOT."/includes/header.inc.php";
        require DOCROOT."/classes/Produit.class.php";
    ?>

    <div class="container-100 fixed-bottom">
        <?php
            require DOCROOT."/includes/footer.inc.php";
            require DOCROOT."/includes/javascript.inc.php";
        ?>
    </div>
</body>

</html>