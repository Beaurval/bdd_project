<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bdd.css">
    <title>bdd</title>
</head>
<body>
<header>
    <h1>Création de personnes swag v2.0</h1>
</header>
<form action="bdd.php" method="post">
    <fieldset id="formulaire">
        <legend>Créer une personne</legend>
        <div>
            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" id="prenom" required>
        </div>
        <div>
            <label for="nom">Nom : </label>
            <input type="text" name="nom" id="nom" required>
        </div>
        <div>
            <label for="age">Age : </label>
            <input type="text" name="age" id="age" required>
        </div>
        <input type="submit" name="envoyer" id="envoyer">
    </fieldset>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: Valentin Beaury
 * Date: 08/01/2019
 * Time: 14:03
 */
try {
    $bdd = 'mysql:host=localhost;dbname=bdd';
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $bdd_pdo = new PDO($bdd, 'root', 'root', $options);

} catch (Exeption $e) {
    die('Erreur :' . $e->getMessage());
}

if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['age'])) {
    $reqt = $bdd_pdo->prepare('INSERT INTO t_personnes(pernom, perprenom, perage) VALUES(?,?,?);');
    $reqt->execute(array($_POST['nom'], $_POST['prenom'], $_POST['age']));
}

echo "<table align='center'>";
echo "<caption><a id='open'>+</a></caption>";
echo "<tr class='ligne'>";
echo "<th>Nom</th>";
echo "<th>Prenom</th>";
echo "<th>Age</th>";
echo "<th>Modifier</th>";
echo "<th>Supprimer</th>";
echo "</tr>";
$reqt = $bdd_pdo->query("SELECT * FROM t_personnes");
while ($data = $reqt->fetch()) {
    echo "<tr class='ligne'>";
    echo "<td>" . $data['pernom'] . "</td>";
    echo "<td>" . $data['perprenom'] . "</td>";
    echo "<td>" . $data['perage'] . "</td>";
    echo "<td class='lien'><a href=''>modifier</a></td>";
    echo "<td class='lien'><a href=''>supprimer</a></td>";
    echo "</tr>";
}
echo "</table>";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(".ligne").hide();
    $("#open").click(function () {
        $(".ligne").toggle(700);
        if (document.getElementById('open').innerHTML == '+')
            $('#open').text("-");
        else
            $('#open').text("+");
    })
</script>
</body>
</html>



