<?php
/**
 * Created by PhpStorm.
 * User: Valentin Beaury
 * Date: 07/01/2019
 * Time: 14:34
 */

//création des personnes
$mode = readline("Voulez vous spécifier le nom des personnes vous-même ? O/N");
if ($mode == 'N' || $mode == 'n'){
    $personne =
        array(
            0=>array("nom" => "berdo","prenom" => "julie","age"=>15),
            1=>array("nom" => "toto","prenom" => "tata","age"=>10),
            2=>array("nom" => "tuche","prenom" => "katy","age"=>12),
            3=>array("nom" => "bolor","prenom" => "arthur","age"=>28),
            4=>array("nom" => "babar","prenom" => "alex","age"=>64),
            5=>array("nom" => "smith","prenom" => "jojo","age"=>52),
            6=>array("nom" => "bond","prenom" => "kante","age"=>37),
            7=>array("nom" => "elves","prenom" => "benjamin","age"=>10),
            8=>array("nom" => "matar","prenom" => "clement","age"=>5),
            9=>array("nom" => "elis","prenom" => "mamadou","age"=>69),
            10=>array("nom" => "elguapo","prenom" => "jean","age"=>52),
            11=>array("nom" => "toredo","prenom" => "gérard","age"=>36),
            12=>array("nom" => "lolo","prenom" => "titouan","age"=>20),
            13=>array("nom" => "catapo","prenom" => "dan","age"=>18),
            14=>array("nom" => "nino","prenom" => "pauline","age"=>3)
        );
}
else{
    $nbPers = readline("Combien de personne voulez-vous renseigner ? (entrez un nombre) ");
    for ($i = 0; $i<$nbPers; $i++){
        $personne[$i]["nom"] = readline("prenom personne ".($i+1)." : ");
        $personne[$i]["prenom"] = readline("nom personne ".($i+1)." : ");
        $personne[$i]["age"] = readline("age personne ".($i+1)." : ");
        echo "\n";
    }
}
echo "\n";
echo "Affichage des personnes de + de 18 ans";
echo "\n";

foreach ($personne as $pers){
    $flag = 0;
    foreach ($pers as $key=>$value){
        if ($pers['age'] > 18)  //si personne a + de 18 ans
            echo $key." : ".$value."\n"; //on affiche
        else
            $flag = 1; //sinon gestion affichage
    }
    if ($flag == 0)
        echo "\n";
}
