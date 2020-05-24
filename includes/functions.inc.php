<?php

    function redirect($url = "accueil")
    {
        header("Location: /".$url);
        die();
    }

    function createSession($user)
    {
        $_SESSION['utilisateur'] = $user;
    }

    function checkForUser($user)
    {
        $Client = new Client();
        $clients = $Client->all();

        foreach ($clients as $client) {
            if ($client['usager'] === $user) {
                return $client['id'];
            }
        }
        return -1;
    }

    function checkForPassword($password, $id)
    {
        $Client = new Client();
        $Client->id = $id;
        $Client->Find();
        $mdp = $Client->mot_passe;
        password_verify($password, $mdp);
        return (password_verify($password, $mdp));
    }

    function checkForEmail($email, $id)
    {
        $Client = new Client();
        $Client->id = $id;
        $Client->Find();

        if ($Client->courriel === $email) {
            return true;
        }
        return false;
    }


    function productExist($search)
    {
        $Produit = new Produit();
        $produits = $Produit->all();

        $id = array();

        foreach ($produits as $produit) {
            if (strpos(strtolower($produit['nom']), strtolower($search)) !== false) {
                array_push($id, $produit['id']);
            }
        }
        return $id;
    }

    function showProduct($id)
    {
        $Produit = new Produit();
        echo "<div class='container-fluid'><div class='row'>";
        for ($i = 0; $i < sizeof($id); $i++):
        $Produit->id = $id[$i];
        $Produit->Find(); ?>
<div class="col-sm-12 col-md-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h3>
                    <?php echo $Produit->nom."</br>"; ?>
                </h3>
                <a href='/<?php echo $Produit->image; ?>'
                    class="btn btn-outline-danger my-2 my-sm-0">
                    Voir plus
                </a>
            </div>
            <div class="col-6">
                <a tabindex="0" class="btn btn-lg" role="button" data-toggle="popover" data-trigger="focus"
                    title="Description du livre"
                    data-content="<?php echo $Produit->description; ?>">
                    <img src='<?php echo "/img/".$Produit->image.".jpg"; ?>'
                        alt='Couverture' width='130' height='200' class="border border-dark rounded-sm">
                </a>
                </br>
            </div>
        </div>
    </div>
    </br>
</div>
<?php endfor;
        echo "</div></div>";
    }
