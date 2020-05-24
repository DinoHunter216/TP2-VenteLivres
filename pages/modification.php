<!doctype html>
<html class="no-js" lang="">

<?php
    require DOCROOT."/includes/head.inc.php";
?>

<style>
    /* https://startbootstrap.com/snippets/full-image-background/ */
    body {
        background: url("/img/enchanting.png") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
    }
</style>

<body>
    <?php
        require DOCROOT."/includes/header.inc.php";
    ?>
    <div class=" container mb-5">
        <div class="card border border-dark shadow bg-light">
            <div class="card-body p-5">

                <?php
                    if (isset($_SESSION['utilisateur'])):
                ?>
                <h1 class=" ml-2 text-danger">Modification</h1>
                <hr style="border: none; border-bottom: 2px solid;" class="text-danger" />
                <form action="/action/validateModification.php" method="post">
                    <div class="rendered-form container-fluid">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="firstName" class="formbuilder-text-label">Prénom
                                </label>
                                <input type="text" name="firstName" id="firstName" class="form-control">
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="lastName" class="formbuilder-text-label">Nom
                                </label>
                                <input type="text" name="lastName" id="lastName" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="email">Votre courriel</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                    </div>
                                    <input type="email" class="form-control" name="email" id="email" />
                                    <div class="invalid-tooltip">
                                        Veuillez ajouter votre adresse email.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="adress" class="formbuilder-text-label">Adresse
                                </label>
                                <input type="text" name="adress" id="adress" class="form-control">
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="city" class="formbuilder-text-label">Ville
                                </label>
                                <input type="text" name="city" id="city" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="province" class="formbuilder-text-label">Province
                                </label>
                                <input type="text" name="province" id="province" class="form-control">
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="postalCode" class="formbuilder-text-label">Code Postal
                                </label>
                                <input type="text" name="postalCode" id="postalCode" class="form-control"
                                    pattern="[A-Za-z][0-9][A-Za-z][0-9][A-Za-z][0-9]">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    pattern=".{8,}" title="8 caractères ou plus." />
                                <div class="invalid-tooltip">
                                    Veuillez entrez un mot de passe de plus de 8 caractères.
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="password-confirm">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" name="passwordConfirm"
                                    id="passwordConfirm" />
                                <div class="invalid-tooltip" id="passwordConfirmation-message">
                                    Veuillez confirmer votre mot de passe.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" value="Modifier" class="btn btn-outline-danger mt-3 ml-3">
                        </div>
                    </div>
                </form>
                <?php
                    else:
                        echo "Erreur: Aucun utilisateur connecté...";
                    endif;
                ?>
            </div>
        </div>
    </div>

    <?php
        require DOCROOT."/includes/footer.inc.php";
        require DOCROOT."/includes/javascript.inc.php";
    ?>
</body>

</html>