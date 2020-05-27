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

    <h1 class=" ml-3 text-danger">GrosLivres</h1>
    <h3 class=" ml-3">Le meilleur vendeur de livre chez LocalHost</h3>

    <div class="container-fluid">
        <hr style=" border: none; border-bottom: 2px solid;" class="text-danger" />
        <div class="row">
            <?php
    
                $Produit = new Produit();
                $produits = $Produit->all();
            
                foreach ($produits as $produit):
            ?>

            <div class="col-sm-12 col-md-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <h3>
                                <?php echo $produit['nom']."</br>"; ?>
                            </h3>
                            <a href='pages/livre.php?id=<?php echo $produit['id']; ?>'
                                class="btn btn-outline-danger my-2 my-sm-0">
                                Voir plus
                            </a>
                        </div>
                        <div class="col-6">
                            <a tabindex="0" class="btn btn-lg" role="button" data-toggle="popover" data-trigger="focus"
                                title="Description du livre"
                                data-content="<?php echo $produit['description'] ?>">
                                <img src='<?php echo "img/".$produit['image'].".jpg"; ?>'
                                    alt='Couverture' width='130' height='200' class="border border-dark rounded-sm">
                            </a>
                            </br>
                        </div>
                    </div>
                </div>
                </br>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php
        require DOCROOT."/includes/footer.inc.php";
        require DOCROOT."/includes/javascript.inc.php";
    ?>
</body>

</html>