<?php
$nom=$_POST['nom'];
$prénom=$_POST['prénom'];
$titre=$_POST['titre'];
$categorie=$_POST['categorie'];
$ISBN=$_POST['ISBN'];

$bdd=new PDO('mysql:host=localhost;dbname=miniprojetlib;charset=utf8','root','');
$rec=$bdd->prepare('INSERT INTO livre(Nom,prenom,titre,categorie,ISBN,reserve) VALUES(:Nom,:prenom,:titre,:categorie,:ISBN,:reserve)');
$rec->execute(array(
    'Nom'=>$nom,
    'prenom'=>$prénom,
    'titre'=>$titre,
    'categorie'=>$categorie,
    'ISBN'=>$ISBN,
    'reserve'=>"0"
));

echo "<h1>Validation d'un livre</h1>";
echo '
        <table>
            <tr>
                <td>Nom de léauteur </td>
                <td id="td2">: '.$nom.'</td>
            </tr>
            <tr>
                <td>Prénom de léauteur </td>
                <td id="td2">: '.$prénom.'</td>
            </tr>
            <tr>
                <td>Titre </td>
                <td id="td2">: '.$titre.'</td>
            </tr>
            <tr>
                <td>Catégorie </td>
                <td id="td2">: '.$categorie.'</td>
            </tr>
            <tr>
                <td>Numéro ISBN </td>
                <td id="td2">: '.$ISBN.'</td>
            </tr>
        </table>

';
?>
<style>
    #td2{
        color: lime;
    }
</style>
