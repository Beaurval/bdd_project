<?php
/**
 * Created by PhpStorm.
 * User: Valentin Beaury
 * Date: 09/01/2019
 * Time: 10:15
 */

require_once 'connexion.php';
if (!empty($_GET)){
    if ($_GET['mode'] == 'supp' ){
        $rqt = $bdd_pdo->prepare("DELETE from t_personnes WHERE id=?");
        $rqt->execute(array($_GET['id']));
    }
    if ($_GET['mode'] == 'modif'){

    }
    header('location: bdd.php');
}