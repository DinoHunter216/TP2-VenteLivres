<!doctype html>
<html class="no-js" lang="">

<?php
    define("SITETITLE", "| Inscription");
    require DOCROOT."/includes/head.inc.php";
?>

<style>
    /* https://startbootstrap.com/snippets/full-image-background/ */
    body {
        background: url("/img/library.jpg") no-repeat center center fixed;
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
                        echo "Déjà connecté";
                else: ?>
                <h1 class=" ml-2 text-danger">Inscription</h1>
                <hr style="border: none; border-bottom: 2px solid;" class="text-danger" />
                <form action="/action/validateInscription.php" method="post" class="needs-validation" novalidate>
                    <div class="rendered-form container-fluid">
                        <div class="row">
                            <div class=" form-group col-sm-12 col-md-6">
                                <label for="firstName" class="formbuilder-text-label">Prénom<span
                                        class="formbuilder-required" style="color: red;">*</span>
                                </label>
                                <input type="text" name="firstName" id="firstName" required="required"
                                    class="form-control">
                            </div>
                            <div class=" form-group col-sm-12 col-md-6">
                                <label for="lastName" class="formbuilder-text-label">Nom<span
                                        class="formbuilder-required" style="color: red;">*</span>
                                </label>
                                <input type="text" name="lastName" id="lastName" required="required"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="email">Votre courriel<span style="color: red;">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                    </div>
                                    <input type="email" class="form-control" name="email" id="email"
                                        required="required" />
                                    <div class="invalid-tooltip">
                                        Veuillez ajouter votre adresse email.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-sm-12 col-md-4">
                                <label for="adress" class="formbuilder-text-label">Adresse<span
                                        class="formbuilder-required" style="color: red;">*</span>
                                </label>
                                <input type="text" name="adress" id="adress" required="required" class="form-control">
                            </div>
                            <div class=" form-group col-sm-12 col-md-4">
                                <label for="city" class="formbuilder-text-label">Ville<span class="formbuilder-required"
                                        style="color: red;">*</span>
                                </label>
                                <input type="text" name="city" id="city" required="required" class="form-control">
                            </div>
                            <div class=" form-group col-sm-12 col-md-4">
                                <label for="province" class="formbuilder-text-label">Province<span
                                        class="formbuilder-required" style="color: red;">*</span>
                                </label>
                                <input type="text" name="province" id="province" required="required"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-sm-12 col-md-6">
                                <label for="postalCode" class="formbuilder-text-label">Code Postal<span
                                        class="formbuilder-required" style="color: red;">*</span>
                                </label>
                                <input type="text" name="postalCode" id="postalCode" required="required"
                                    pattern="[A-Za-z][0-9][A-Za-z][0-9][A-Za-z][0-9]" class="form-control">
                            </div>
                            <div class=" form-group col-sm-12 col-md-6">
                                <label for="user" class="formbuilder-text-label">Nom
                                    d'usager<span class="formbuilder-required" style="color: red;">*</span>
                                </label>
                                <input type="text" name="user" id="user" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" form-group col-sm-12 col-md-6">
                                <label for="password">Mot de passe<span style="color: red;">*</span></label>
                                <input type="password" class="form-control" name="password" id="password"
                                    required="required" pattern=".{8,}" title="8 caractères ou plus." />
                                <div class="invalid-tooltip">
                                    Veuillez entrez un mot de passe de plus de 8 caractères.
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="password-confirm">Confirmer le mot de passe<span
                                        style="color: red;">*</span></label>
                                <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm"
                                    required="required" />
                                <div class="invalid-tooltip" id="passwordConfirmation-message">
                                    Veuillez confirmer votre mot de passe.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="S'inscrire" class="btn btn-outline-danger mt-3 ml-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php
        require DOCROOT."/includes/footer.inc.php";
        require DOCROOT."/includes/javascript.inc.php";
    ?>
</body>

</html>