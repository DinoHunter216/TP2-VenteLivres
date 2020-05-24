<!doctype html>
<html class="no-js" lang="" style="height: 100%;">

<?php
    define("SITETITLE", "| Connexion");
    require DOCROOT."/includes/head.inc.php";
?>

<style>
    /* https://startbootstrap.com/snippets/full-image-background/ */
    body {
        background: url("/img/bookshelf.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
    }
</style>

<body class="bg-light">

    <?php
        require DOCROOT."/includes/header.inc.php";
    ?>
    <div class=" container mb-5">
        <div class="card border border-dark shadow my-5 bg-light">
            <div class="card-body p-5">
                <?php
                    if (isset($_SESSION['utilisateur'])):
                        echo "Déjà connecté";
                    else:
                ?>
                <h1 class=" ml-2 text-danger">Connexion</h1>
                <hr style="border: none; border-bottom: 2px solid;" class="text-danger" />
                <form action="action/validateConnection.php" method="post" class="needs-validation" novalidate>
                    <div class="rendered-form">
                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="user" class="formbuilder-text-label">Nom d'usager<span
                                    class="formbuilder-required" style="color: red;">*</span>
                            </label></br>
                            <input type="text" name="user" id="user" required="required" class="form-control">
                            <div class="invalid-tooltip">
                                Veuillez entrer votre mot de passe.
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                            <label for="password">Mot de passe<span style="color: red;">*</span></label>
                            <input type="password" class="form-control" name="password" id="password"
                                required="required" pattern=".{8,}" title="8 caractères ou plus." />
                            <div class="invalid-tooltip">
                                Veuillez entrer un mot de passe de plus de 8 caractères.
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Se connecter" class="btn btn-outline-danger mt-3 ml-3">
                    </div>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container-100 fixed-bottom">
        <?php
            require DOCROOT."/includes/footer.inc.php";
            require DOCROOT."/includes/javascript.inc.php";
        ?>
    </div>
</body>

</html>