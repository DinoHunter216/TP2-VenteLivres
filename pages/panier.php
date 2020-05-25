<!doctype html>
<html class="no-js" lang="">

<?php
    define("SITETITLE", "| Accueil");
    require DOCROOT."/includes/head.inc.php";
?>

<style>
    /* https://startbootstrap.com/snippets/full-image-background/ */
    body {
        background: url("/img/library2.png") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
    }
</style>

<body class="bg-light">
    <?php
        require DOCROOT."/includes/header.inc.php";
        require DOCROOT."/classes/Produit.class.php";
    ?>

    <div class=" container mb-5">
        <div class="card border border-dark shadow my-5 bg-light">
            <div class="card-body p-5">
                <h1 class=" ml-2 text-danger">Panier</h1>
                <hr style="border: none; border-bottom: 2px solid;" class="text-danger" />

                <div class="container-fluid">
                    <?php
                        showCart();
                        if (getNumberOfItems() > 0 && isset($_SESSION['utilisateur'])):
                    ?>
                    <form action="action/validateOrder.php" method="post" class="mt-5">
                        <div class="rendered-form">
                            <input type="submit" value="Passer ma commande" class="btn btn-outline-danger mx-auto"
                                style="width: 100%;">
                        </div>
                    </form>
                    <?php
                        else:
                            echo "<p class='ml-3 mb-0 mt-2'>Vous devez être connecté pour passer une commande.</p>";
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>