<?php
    require "../includes/config.inc.php";
    require "../includes/functions.inc.php";
    require "../classes/Client.class.php";
    $id = checkForUser($_SESSION['utilisateur']);

    $Client = new Client();
    $Client->id = $id;
    

    if (isset($_POST['firstName']) && $_POST['firstName'] != '') {
        $Client->prenom = $_POST['firstName'];
    }

    if (isset($_POST['lastName']) && $_POST['lastName'] != '') {
        $Client->nom = $_POST['lastName'];
    }

    if (isset($_POST['adress']) && $_POST['adress'] != '') {
        $Client->adresse = $_POST['adress'];
    }

    if (isset($_POST['city']) && $_POST['city'] != '') {
        $Client->ville = $_POST['city'];
    }

    if (isset($_POST['province']) && $_POST['province'] != '') {
        $Client->province = $_POST['province'];
    }

    if (isset($_POST['postalCode']) && $_POST['postalCode'] != '') {
        $Client->code_postal = $_POST['postalCode'];
    }

    if (isset($_POST['password']) && $_POST['password'] != '') {
        if (isset($_POST['passwordConfirm']) && $_POST['passwordConfirm'] != '') {
            if (validateEmail()) {
                $Client->mot_passe = $_POST['password'];
            } else {
                echo "Mot de passe déjà pris.";
            }
        } else {
            echo "Veuillez confirmer le mot de passe";
        }
    }

    if (isset($_POST['email']) && $_POST['email'] != '') {
        if (validateEmail()) {
            $Client->courriel = $_POST['email'];
        }
    }

    $Client->Save();
    redirect();
