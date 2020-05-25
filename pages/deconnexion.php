<?php
    
    session_start();
    unset($_SESSION['utilisateur']);
    redirect();
