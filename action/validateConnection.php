<?php
    require "../includes/config.inc.php";
    require "../includes/functions.inc.php";
    require "../classes/Client.class.php";

    if (isset($_POST['user']) && isset($_POST['password'])) {
        $id = checkForUser($_POST['user']);
        if ($id > -1) {
            if (checkForPassword($_POST['password'], $id)) {
                session_start();
                createSession($_POST['user']);
                redirect();
            } else {
                redirect();
            }
        } else {
            redirect();
        }
    } else {
        redirect();
    }
