<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier</title>
    <link rel="stylesheet" href="bdd.css">
</head>
<body>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Valentin Beaury
 * Date: 09/01/2019
 * Time: 10:15
 */

require_once 'connexion.php';
if (!empty($_GET)) {

    if ($_GET['mode'] == 'supp') {
        $rqt = $bdd_pdo->prepare("DELETE from t_personnes WHERE id=?");
        $rqt->execute(array($_GET['id']));
        header('location: bdd.php');
    }

    if ($_GET['mode'] == 'modif_input') {
        $rqt = $bdd_pdo->prepare("SELECT * FROM t_personnes WHERE id=?");
        $rqt->execute(array($_GET['id']));
        $data = $rqt->fetch();

        $nom = $data["pernom"];
        $prenom = $data["perprenom"];
        $age = $data["perage"];
        $id = $data['id'];

        echo
        "
        <form action=\"modification.php\" method='post'>
        <fieldset id=\"formulaire\">
            <legend>Modifier une personne</legend>
            <div>
                <label for=\"prenom\">Prénom : </label>
                <input type=\"text\" name=\"prenom\" id=\"prenom\" required value='$prenom'>
            </div>
            <div>
                <label for=\"nom\">Nom : </label>
                <input type=\"text\" name=\"nom\" id=\"nom\" required value='$nom'>
            </div>
            <div>
                <label for=\"age\">Age : </label>
                <input type=\"text\" name=\"age\" id=\"age\" required value='$age'>
            </div>
            <input type='hidden' name='id' value='$id'>
            <input type=\"submit\" name=\"modifier\" id=\"envoyer\" value='modifier'>
        </fieldset>
       </form>
       ";
    }
}
if (isset($_POST["modifier"])) {
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $rqt = $bdd_pdo->prepare("UPDATE t_personnes SET pernom = :nom, perprenom = :prenom, perage = :age WHERE id = :id  ");
    $rqt->execute(array(':nom' => $nom, ':prenom' => $prenom, ':age' => $age, ':id' => $id));
    header('location: bdd.php');
}