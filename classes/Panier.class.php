<?php
/**
 * Classe de Ville
 *
 * PHP version 7.2.4
 *
 * @category  CategoryName
 * @package   PackageName
 * @author    Jimmy Gilbert <masterjim@gmail.com>
 * @copyright 2019 Jimmy Gilbert
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   GIT: $Id$
 * @link      http://pear.php.net/package/PackageName
 */

require_once "Crud.class.php";

/**
 * Classe de gestion des villes
 *
 * PHP version 7.2.4
 *
 * @category  CategoryName
 * @package   Example
 * @author    Jimmy Gilbert <masterjim@gmail.com>
 * @copyright 2019 Jimmy Gilbert
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.0
 * @link      http://pear.php.net/package/PackageName
 */
class Panier extends Crud
{
    // Your Table name
    protected $table = 'produit_commande';

    // Primary Key of the Table
    protected $pk = 'id';
}
