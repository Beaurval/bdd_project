<?php
/**
 * Created by PhpStorm.
 * User: Valentin Beaury
 * Date: 08/01/2019
 * Time: 14:03
 */
try {
    $bdd = 'mysql:host=localhost;dbname=bdd';
    $bdd_pdo = new PDO($bdd, 'root', 'root');
}
catch(Exeption $e){
    die('Erreur :' . $e->getMessage());
}
$rep = $bdd_pdo->query('Select * from t_personnes');
while ($data = $rep->fetch()){
    echo $data['id']." ".$data["pernom"]." ".$data["perprenom"]." ".$data["perage"];
}