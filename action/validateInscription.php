<?php
    require "../includes/config.inc.php";
    require "../includes/functions.inc.php";
    require "../classes/Client.class.php";

    if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
        if (isset($_POST['adress']) && isset($_POST['city'])) {
            if (isset($_POST['province']) && isset($_POST['postalCode'])) {
                if (isset($_POST['user']) && isset($_POST['email'])) {
                    if (isset($_POST['password']) && isset($_POST['passwordConfirm'])) {
                        $id = checkForUser($_POST['user']);
                        if ($id === -1) {
                            if (validatePassword()) {
                                if (validateEmail()) {
                                    session_start();
                                    createSession($_POST['user']);
                                    createUser();
                                } else {
                                    redirect("inscription");
                                }
                            } else {
                                redirect("inscription");
                            }
                        } else {
                            redirect("inscription");
                        }
                    }
                }
            }
        }
    }

    /**
     * Vérifie si le mot de passe existe
     * @return bool: Vrai s'il existe
     */
    function validatePassword()
    {
        $ids = getIDs();

        foreach ($ids as $id) {
            if (checkForPassword($_POST['password'], $id)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Vérifie si l'adresse email existe
     * @return bool: Vrai s'il existe
     */
    function validateEmail()
    {
        $ids = getIDs();

        foreach ($ids as $id) {
            if (checkForEmail($_POST['email'], $id)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Retourne la liste des ID de tous les clients
     * @return array: Les ID
     */
    function getIDs()
    {
        $Client = new Client();
        $clients = $Client->all();

        $id = array();
        foreach ($clients as $client) {
            array_push($id, $client['id']);
        }
        return $id;
    }

    /**
     * Crée l'utilisateur dans la base de données
     */
    function createUser()
    {
        $Client = new Client();
        $Client->prenom = $_POST['firstName'];
        $Client->nom = $_POST['lastName'];
        $Client->adresse = $_POST['adress'];
        $Client->ville = $_POST['city'];
        $Client->mot_passe = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $Client->province = $_POST['province'];
        $Client->code_postal = $_POST['postalCode'];
        $Client->usager = $_POST['user'];
        $Client->courriel = $_POST['email'];
        $Client->Create();
        redirect();
    }
