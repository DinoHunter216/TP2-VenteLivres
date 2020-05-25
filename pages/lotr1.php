<!doctype html>
<html class="no-js" lang="">

<?php
    define("SITETITLE", "| Livres");
    require DOCROOT."/includes/head.inc.php";
?>

<body class="bg-light">
    <?php
        require DOCROOT."/includes/header.inc.php";
        require DOCROOT."/classes/Produit.class.php";
    
        $Produit = new Produit();
        $Produit->id = "3";
        $Produit->Find();

        $Produit2 = new Produit();
        $Produit2->id = "4";
        $Produit2->Find();

        $Produit3 = new Produit();
        $Produit3->id = "5";
        $Produit3->Find();
    ?>
    <div class="container-fluid">
        <div class="row">
            <h1 class="ml-3 text-danger"><?php echo $Produit->nom."</br>"; ?>
            </h1>
        </div>
        <div class="row">
            <h4 class="ml-3 text-dark"><?php echo "Date de publication: ".$Produit->date."</br>"; ?>
            </h4>
        </div>
        <hr style="border: none; border-bottom: 2px solid;" class="text-danger" />

        <div class="row">
            <?php echo "<img src='img/".$Produit->image.".jpg' class='img-fluid ml-3 border border-dark rounded-lg' alt='Couverture' width='400' height='600'></br>"; ?>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <?php echo "<h5 align='justify'>".$Produit->description."</h5></br>"; ?>
                </br>
                <?php echo "<h5 align='justify' class='text-danger'>Prix: ".$Produit->prix."$</h5></br>"; ?>
                <?php
                    if ($Produit->quantite == 0):
                        echo "<div class='container'>
                            <div class='row'>
                                <svg class='bi bi-exclamation-circle text-danger mb-2' width='2em' height='2em' viewBox='0 0 16 16' fill='currentColor'
                                        xmlns='http://www.w3.org/2000/svg'>
                                    <path fill-rule='evenodd' d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                    <path d='M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z' />
                                </svg>
                                <h3 align='justify' class='ml-2'>Hors stock</h3>
                            </div>
                        </div></br>";
                    else: ?>
                <h5 align='justify'>Quantité en stock: <?php echo $Produit->quantite; ?> livres disponibles
                </h5></br>
                </br>
                </br>
                </br>
                <form action="action/validateCart.php" method="post">
                    <div class="rendered-form"><input type="hidden" name="cart"
                            value="<?php echo $Produit->id; ?>">
                    </div>
                    <input type="submit" value="Ajouter au panier" class="btn btn-outline-danger">
                </form>
                <?php
                    endif;
                ?>

            </div>
            <div class="col-sm-12 col-lg-4 container ml-2">
                <div class="row">
                    <div class="col-6">
                        <h3>
                            <?php echo $Produit2->nom."</br>"; ?>
                        </h3>
                        <a href='/<?php echo $Produit2->image; ?>'
                            class="btn btn-outline-danger my-2 my-sm-0">
                            Voir plus
                        </a>
                    </div>
                    <div class="col-6">
                        <a tabindex="0" class="btn btn-lg" role="button" data-toggle="popover" data-trigger="focus"
                            title="Description du livre"
                            data-content="<?php echo $Produit2->description ?>">
                            <img src='<?php echo "img/".$Produit2->image.".jpg"; ?>'
                                alt='Couverture' width='130' height='200' class="border border-dark rounded-sm">
                        </a>
                        </br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h3>
                            <?php echo $Produit3->nom."</br>"; ?>
                        </h3>
                        <a href='/<?php echo $Produit3->image; ?>'
                            class="btn btn-outline-danger my-2 my-sm-0">
                            Voir plus
                        </a>
                    </div>
                    <div class="col-6">
                        <a tabindex="0" class="btn btn-lg" role="button" data-toggle="popover" data-trigger="focus"
                            title="Description du livre"
                            data-content="<?php echo $Produit3->description ?>">
                            <img src='<?php echo "img/".$Produit3->image.".jpg"; ?>'
                                alt='Couverture' width='130' height='200' class="border border-dark rounded-sm">
                        </a>
                        </br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </br>

    <?php
        require DOCROOT."/includes/footer.inc.php";
        require DOCROOT."/includes/javascript.inc.php";
    ?>
</body>

</html>