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

    function createCart()
    {
        $_SESSION['cartExists'] = true;
        $_SESSION['cartArray'] = array();
    }

    function addItemToCart($item)
    {
        array_push($_SESSION['cartArray'], $item);
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

    function getNumberOfItems()
    {
        $produits = $_SESSION['cartArray'];
        $numberOfItems = 0;
        foreach ($produits as $produit) {
            $numberOfItems++;
        }
        return $numberOfItems;
    }

    function showCart()
    {
        $Produit = new Produit();
        if (getNumberOfItems() > 0) {
            $products = $_SESSION['cartArray'];
            foreach ($products as $id) {
                $Produit->id = $id;
                $Produit->Find(); ?>
<div class="row">
    <div class="col-sm-2 col-lg-1">
        <a tabindex="0" class="btn btn-lg" role="button" data-toggle="popover" data-trigger="focus"
            title="Description du livre"
            data-content="<?php echo $Produit->description; ?>">
            <img src='<?php echo "/img/".$Produit->image.".jpg"; ?>'
                alt='Couverture' width='70' height='105' class="border border-dark rounded-sm">
        </a>
        </br>
    </div>
    <div class="ml-sm-4 ml-md-4 col-sm-8">
        <div class="container-fluid">
            <div class="row">
                <h3>
                    <?php echo $Produit->nom; ?>
                </h3>
            </div>
            <div class="row mt-1">
                <a href='/<?php echo $Produit->image; ?>'
                    class="btn btn-outline-danger my-1">
                    Voir plus
                </a>
                <p class="mt-2 ml-3">
                    <?php echo $Produit->prix." $"; ?>
                </p>
            </div>

        </div>
    </div>
    <div class="col-sm-2 col-lg-1">
        <form action="action/deleteItem.php" method="post" class="my-5">
            <div class="rendered-form">
                <input type="hidden" name="item"
                    value="<?php echo $Produit->id; ?>">
                <input type="submit" value="Supprimer du panier" class="btn btn-outline-danger">
            </div>
        </form>
    </div>

</div>
<?php
            }
            showTotalPrice();
        } else {
            echo "Aucun produit dans le panier";
        }
    }

    function showTotalPrice()
    {
        $price = 0;
        $Produit = new Produit();
        $products = $_SESSION['cartArray'];
        foreach ($products as $id) {
            $Produit->id = $id;
            $Produit->Find();
            $price += $Produit->prix;
        }
        echo "<h4 class='ml-3 mb-0 mt-2 text-danger'>Le prix total est de ".$price."$</h4>";
    }

    function deleteItemFromCart($item)
    {
        $index = array_search($item, $_SESSION['cartArray']);
        unset($_SESSION['cartArray'][$index]);
    }

    function createOrder($method)
    {
        $Commande = new Commande();
        $Client = new Client();
        // $Commande->date = date("Y-m-d");
        // $Commande->statut = 'en cours';
        // if ($method == 'check') {
        //     $Commande->type_paiement = 'chèque';
        // } elseif ($method == 'cash') {
        //     $Commande->type_paiement = 'comptant';
        // } elseif ($method == 'credit') {
        //     $Commande->type_paiement = 'crédit';
        // } elseif ($method == 'paypal') {
        //     $Commande->type_paiement = 'paypal';
        // }
        // $client = $Client->checkForUser($_SESSION['utilisateur']);
        // $client->Find();
        // $Commande->id_client = $client;
        // $Commande->Create();
    }

    function getRandomId()
    {
        return rand(3, 11);
    }
