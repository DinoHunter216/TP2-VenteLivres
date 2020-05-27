<!doctype html>
<html class="no-js" lang="">

<?php
    define("SITETITLE", "| Facture");
    require DOCROOT."/includes/head.inc.php";
?>

<style>
    /* https://startbootstrap.com/snippets/full-image-background/ */
    body {
        background: url("/img/library3.png") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
    }
</style>

<body class="bg-light">
    <?php
        require DOCROOT."/includes/header.inc.php";
        require DOCROOT."/classes/Panier.class.php";
        require DOCROOT."/classes/Produit.class.php";
    ?>

    <div class=" container mb-5">
        <div class="card border border-dark shadow my-5 bg-light">
            <div class="card-body p-5">
                <h1 class=" ml-2 text-danger">Facture</h1>
                <hr style="border: none; border-bottom: 2px solid;" class="text-danger" />

                <?php
                    if (isset($_SESSION['utilisateur'])):
                ?>
                <h3>Commande #<?php echo $_SESSION['orderId']; ?>
                </h3>
                <h3 class="mb-3">Méthode de paiment: <?php echo $_SESSION['payment']; ?>
                </h3>
                <div class="container-fluid">
                    <?php
                        $Panier= new Panier();
                        $products = $Panier->all();
                        foreach ($products as $product) {
                            if ($product['id_commande'] == $_SESSION['orderId']) {
                                $Produit = new Produit();
                                $Produit->id = $product['id_produit'];
                                $Produit->Find();
                                $price = $Produit->prix;
                                echo "<div class='row'>";
                                echo "<div class='col-6'><h4>Produit #".$product['id_produit']."</h4> <h6>(".$Produit->nom.")</h6>"."<h4> x ".$product['quantite']."</h4></div>";
                                echo "<div class='col-6 mt-5'><h4>Prix: ".($price * $product['quantite'])."$</h4></div>";
                                echo "</div>";
                            }
                        }
                    ?>
                </div>
                <h4 class="text-danger mt-3">Prix total: <?php echo $_SESSION['price']; ?>$
                </h4>
                <h3 class="text-danger">Prix final: <?php echo number_format(($_SESSION['price'] * 1.05), 2); ?>$
                    (TPS seulement)</h3>
                <h5 class="mt-3">Adresse de livraison: <?php echo $_SESSION['adress']; ?>
                </h5>
                <?php
                    endif;
                ?>
            </div>
        </div>
        <?php require DOCROOT."/includes/javascript.inc.php"; ?>
        <script>
            document.getElementById("payment").selectedIndex = -1;
            //https://stackoverflow.com/questions/8605516/default-select-option-as-blank
        </script>
</body>

</html>