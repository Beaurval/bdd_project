<?php
/**
 * Created by PhpStorm.
 * User: Valentin Beaury
 * Date: 09/01/2019
 * Time: 10:17
 */
try {
    $bdd = 'mysql:host=localhost;dbname=bdd';
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $bdd_pdo = new PDO($bdd, 'root', 'root', $options);

} catch (Exeption $e) {
    die('Erreur :' . $e->getMessage());
}