<?php
$nom=$_POST['nom'];
$prénom=$_POST['prénom'];
$adresse=$_POST['adresse'];
$ville=$_POST['ville'];
$postal=$_POST['postal'];

$pass=$_POST['password'];
$bdd=new PDO('mysql:host=localhost;dbname=miniprojetlib;charset=utf8','root','');
$rec=$bdd->prepare('INSERT INTO lecteur(Nom,prenom,adresse,ville,postal,motdepasse) VALUES(:Nom,:prenom,:adresse,:ville,:postal,:motdepasse)');
$rec->execute(array(
    'Nom'=>$nom,
    'prenom'=>$prénom,
    'adresse'=>$adresse,
    'ville'=>$ville,
    'postal'=>$postal,
    'motdepasse'=>$pass
));





echo "<h1>Validation d'un lecteur</h1>";
echo '
        <table>
            <tr>
                <td>Nom </td>
                <td id="td2">: '.$nom.'</td>
            </tr>
            <tr>
                <td>Prénom </td>
                <td id="td2">: '.$prénom.'</td>
            </tr>
            <tr>
                <td>Adresse :</td>
                <td id="td2">: '.$adresse.'</td>
            </tr>
            <tr>
                <td>Ville </td>
                <td id="td2">: '.$ville.'</td>
            </tr>
            <tr>
                <td>Code postal </td>
                <td id="td2">: '.$postal.'</td>
            </tr>
        </table>

';
?>
<style>
    #td2{
        color: lime;
    }
</style>
