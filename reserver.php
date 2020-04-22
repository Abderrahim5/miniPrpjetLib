<?php
session_start();

$mom=$_POST['mom'];
$mom1=$_POST['mom1'];
$mom2=$_POST['mom2'];
$mom3=$_POST['mom3'];
$mom4=$_POST['mom4'];
$mom5=$_POST['mom5'];

$_SESSION['m']=$mom;
$_SESSION['m1']=$mom1;
$_SESSION['m2']=$mom2;
$_SESSION['m3']=$mom3;
$_SESSION['m4']=$mom4;
$_SESSION['m5']=$mom5;

$dd=$_SESSION['idd'];
$d1d=78;
$bdd2=new PDO('mysql:host=localhost;dbname=miniprojetlib;charset=utf8','root','');
//$bdd2->query('delete  FROM livre where ID='.$mom.' ');
$bdd2->query('create table res'.$dd.'(
        id int (255) PRIMARY KEY ,
        nom varchar (20),
        prenom varchar (20),
        code varchar (20),
        titre varchar (20),
        categorie varchar (20),
        ISBN varchar (20),
        DateReserve varchar (20),
        DateRetour varchar (20)
);


');



echo'
<form method="post" action="confirm.php">
<h1>Réserver un livre</h1>
    <p>Vous désirez réserver le livres suivant:</p><br>
    <table border="1" style="background-color: #2d6987">
        <tr>
            <td>Code de livre</td>
            <td id="g">'.$mom.'</td>
        </tr>
         <tr>
            <td>Nom de l\'auteur</td>
            <td id="g">'.$mom1.'</td>
        </tr>
         <tr>
            <td>Prénom de l\'auteur</td>
            <td id="g">'.$mom2.'</td>
        </tr>
         <tr>
            <td>Titre</td>
            <td id="g">'.$mom3.'</td>
        </tr>
         <tr>
            <td>Catégorie</td>
            <td id="g">'.$mom4.'</td>
        </tr>
         <tr>
            <td>ISBN</td>
            <td id="g">'.$mom5.'</td>
        </tr>
        
    </table>
    <input type="submit" value="confirmet">
    </form>
    ';


?>
<style>
    #g{
        color: lime;
        text-decoration-style: double;
    }
</style>
