<!doctype html>
<html class="no-js" lang="">

<?php
    define("SITETITLE", "| Panier");
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
                    <form action="action/validateOrder.php" method="post" class="mt-5 needs-validation" novalidate>
                        <div class="rendered-form">
                            <div class="form-group col-sm-12 mb-4">
                                <label for="payment">Méthode de paiement<span class="formbuilder-required"
                                        style="color: red;">*</span></label>
                                <select class="form-control" name="payment" required="required" id="payment">
                                    <option disabled> -- Choisir une option -- </option>
                                    <option value="check">Chèque</option>
                                    <option value="cash">Comptant</option>
                                    <option value="credit">Crédit</option>
                                    <option value="paypal">Paypal</option>
                                </select>
                                <div class="invalid-tooltip">
                                    Veuillez choisir une méthode paiement.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <input type="submit" value="Passer ma commande" class="btn btn-outline-danger mx-auto"
                                style="width: 100%;">
                        </div>
                    </form>
                    <?php
                        else:
                            echo "<p class='mb-0 mt-2'>Vous devez être connecté pour passer une commande.</p>";
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php require DOCROOT."/includes/javascript.inc.php"; ?>
    <script>
        document.getElementById("payment").selectedIndex = -1;
        //https://stackoverflow.com/questions/8605516/default-select-option-as-blank
    </script>
</body>

</html>