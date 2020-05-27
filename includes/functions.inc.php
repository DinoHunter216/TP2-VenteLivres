<?php

    function redirect($url = "accueil")
    {
        header("Location: /".$url);
        die();
    }

    /********************
    Fonctions de connexion
    ********************/
    
    /**
     * Création de l'utilisateur en session
     * @param user:     Nom d'usager de l'utilisateur
     */
    function createSession($user)
    {
        $_SESSION['utilisateur'] = $user;
    }
    
    /**
     * Vérification de l'utilisateur
     * @param user:     ID de l'utilisateur
     * @return id:      L'ID de l'utilisateur ou -1 s'il n'existe pas
     */
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

    /**
     * Vérification du mot de passe
     * @param password: Le mot de passe entré lors de la connexion
     * @param id:       ID du client
     * @return bool:    Vrai si le mot de passe correspond
     */
    function checkForPassword($password, $id)
    {
        $Client = new Client();
        $Client->id = $id;
        $Client->Find();
        $mdp = $Client->mot_passe;
        password_verify($password, $mdp);
        return (password_verify($password, $mdp));
    }

    /********************
    Fonctions d'inscription
    ********************/

    /**
     * Vérification du email
     * @param email:    L'email entré lors de l'inscription
     * @param id:       ID du client
     * @return bool:    Vrai si l'email existe déjà
     */
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

    /********************
    Fonctions de panier
    ********************/

    /**
     * Création du panier en session
     */
    function createCart()
    {
        $_SESSION['cartExists'] = true;
        $_SESSION['cartArray'] = array();
    }

    /**
     * Ajout d'un item dans le panier
     * @param itemID: ID de l'item à ajouter
     */
    function addItemToCart($itemID)
    {
        array_push($_SESSION['cartArray'], $itemID);
    }

    /**
     * Retourne le nombre d'item dans le panier
     * @return numberOfItems: Le nombre d'item dans le panier
     */
    function getNumberOfItems()
    {
        $produits = $_SESSION['cartArray'];
        $numberOfItems = 0;
        foreach ($produits as $produit) {
            $numberOfItems++;
        }
        return $numberOfItems;
    }
    
    /**
     * Retourne le nombre de fois qu,un item se retrouve dans le panier
     * @param id:               ID de l'item recherché
     * @return numberOfTimes:   Le nombre de fois que l'item recherché est trouvé dans le panier
     */
    function getNumberOfTimesItemIsInCart($id)
    {
        $cart = $_SESSION['cartArray'];
        $numberOfTimes = 0;
        foreach ($cart as $product) {
            if ($product == $id) {
                $numberOfTimes++;
            }
        }
        return $numberOfTimes;
    }
    
    /**
     * Affiche le panier en HTML
     */
    function showCart()
    {
        if (getNumberOfItems() > 0) {
            $Produit = new Produit();
            $products = $Produit->all();
            foreach ($products as $product) {
                $id = $product['id'];
                $productsArray = $_SESSION['cartArray'];
                if (in_array($id, $productsArray)) { ?>
<div class="row">
    <div class="col-sm-2 col-lg-1">
        <a tabindex="0" class="btn btn-lg" role="button" data-toggle="popover" data-trigger="focus"
            title="Description du livre"
            data-content="<?php echo $product['description']; ?>">
            <img src='<?php echo "/img/".$product['image'].".jpg"; ?>'
                alt='Couverture' width='70' height='105' class="border border-dark rounded-sm">
        </a>
        </br>
    </div>
    <div class="ml-sm-4 ml-md-4 col-sm-5">
        <div class="container-fluid">
            <div class="row">
                <h3>
                    <?php echo $product['nom']; ?>
                </h3>
            </div>
            <div class="row mt-1">
                <a href='pages/livre.php?id=<?php echo $produit['id']; ?>'
                    class="btn btn-outline-danger my-1">
                    Voir plus
                </a>
                <p class="mt-2 ml-3">
                    <?php echo($product['prix'] * getNumberOfTimesItemIsInCart($product['id']))." $"; ?>
                </p>
                <p class="mt-2 ml-3">
                    <?php echo "Quantité: ".getNumberOfTimesItemIsInCart($product['id']); ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <form
            action="../action/addQuantity.php?quantiteMax=<?php echo $product['quantite']; ?>"
            method="post" class="container mt-3">
            <div class="rendered-form"><input type="hidden" name="id"
                    value="<?php echo $product['id']; ?>">
                <label for="quantity" required="true">Quantité à ajouter</label>
                <input type="number" name="quantity" class="form-control" min="0"
                    max="<?php echo($product['quantite'] - getNumberOfTimesItemIsInCart($product['id'])); ?>">
            </div>
            <input type="submit" value="Ajouter" class="btn btn-outline-danger mt-2" style="width: 100%;">
        </form>
    </div>
    <div class="col-sm-2 col-lg-1 ml-2">
        <form action="action/deleteItem.php" method="post" class="my-5">
            <div class="rendered-form">
                <input type="hidden" name="item"
                    value="<?php echo $product['id']; ?>">
                <input type="submit" value="Supprimer du panier" class="btn btn-outline-danger">
            </div>
        </form>
    </div>

</div>
<?php
                }
            }
            $price = getTotalPrice();
            echo "<h4 class='ml-3 mb-0 mt-2 text-danger'>Le prix total est de ".$price."$</h4>"; ?>
<form action="action/deleteCart.php" method="post" class="mb-2 mt-3">
    <div class="rendered-form">
        <input type="hidden" name="cart">
        <input type="submit" value="Vider le panier" class="btn btn-outline-danger">
    </div>
</form>
<?php
        } else {
            echo "Aucun produit dans le panier";
        }
    }
    
    /**
     * Retourne le prix total des items dans le panier
     * @return price: Le prix total
     */
    function getTotalPrice()
    {
        $price = 0;
        $Produit = new Produit();
        $products = $_SESSION['cartArray'];
        foreach ($products as $id) {
            $Produit->id = $id;
            $Produit->Find();
            $price += $Produit->prix;
        }
        return $price;
    }

    /**
     * Retire un item du panier
     * @param item: L'item à retirer
     */
    function deleteItemFromCart($item)
    {
        $index = array_search($item, $_SESSION['cartArray']);
        unset($_SESSION['cartArray'][$index]);
    }

    /********************
    Fonctions de recherche
    ********************/

    /**
     * Vérifie si le produit recherché existe
     * @param search:   Le produit recherché
     * @return id:      ID du ou des produits si trouvé
     */
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

    /**
     * Affiche le produit recherchés
     * @param id: ID du produit recherché
     */
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

    /********************
    Fonctions de commande
    ********************/

    /**
     * Crée la commande dans la base de données
     * @return id: ID du client qui passe la commande
     */
    function createOrder($method)
    {
        $Commande = new Commande();
        $Client = new Client();
        $Commande->date = date("Y-m-d");
        $Commande->statut = 'en cours';
        if ($method == 'check') {
            $Commande->type_paiement = 'chèque';
            $_SESSION['payment'] = 'Chèque';
        } elseif ($method == 'cash') {
            $Commande->type_paiement = 'comptant';
            $_SESSION['payment'] = 'Comptant';
        } elseif ($method == 'credit') {
            $Commande->type_paiement = 'crédit';
            $_SESSION['payment'] = 'Crédit';
        } elseif ($method == 'paypal') {
            $Commande->type_paiement = 'paypal';
            $_SESSION['payment'] = 'Paypal';
        }
        $Client->id = checkForUser($_SESSION['utilisateur']);
        $Client->Find();
        $Commande->id_client = $Client->id;
        $clientId = $Client->id;
        $Commande->Create();

        return $clientId;
    }

    /**
     * Insère dans la table produit_commande les produits pour la dernière commande
     * @param clientID: ID du client qui a passé la commande
     */
    function createBill($clientId)
    {
        $Produit = new Produit();
        $products = $Produit->all();
        foreach ($products as $product) {
            $id = $product['id'];
            $productsArray = $_SESSION['cartArray'];
            if (in_array($id, $productsArray)) {
                $Panier = new Panier();
                $Panier->id_produit = $product['id'];

                $Commande = new Commande();
                $Commande->id = getLastOrder($clientId);
                $Commande->Find();
                $Panier->id_commande = $Commande->id;
                $_SESSION['orderId'] = $Commande->id;

                $quantity = getNumberOfTimesItemIsInCart($product['id']);
                $Panier->quantite = $quantity;
                $Panier->Create();
            }
        }
    }

    /**
     * Enlève les produits commandés de la base de données
     */
    function removeQuantities()
    {
        $produits = $_SESSION['cartArray'];
        foreach ($produits as $id) {
            $Produit = new Produit();
            $Produit->id = $id;
            $Produit->Find();
            $quantite = $Produit->quantite;
            $quantite--;
            $Produit->quantite = $quantite;
            $Produit->Save();
        }
    }

    function emptyCart()
    {
        $_SESSION['cartArray'] = array();
    }

    /**
     * Retourne la dernière commande du client
     * @param clientId: ID du client
     * @return order:   La dernière commande
     */
    function getLastOrder($clientId)
    {
        $ordersArray = array();
        $Commande = new Commande();
        $orders = $Commande->all();
        foreach ($orders as $order) {
            array_push($ordersArray, $order['id']);
        }
        return end($ordersArray);
    }

    /********************
    Fonctions autres
    ********************/

    /**
     * Retourne un nombre aléatoire entre ID du premier produit et du dernier
     * @return id: ID aléatoire
     */
    function getRandomId()
    {
        return rand(3, 11);
    }
