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
