<?php
session_start();
$id1=$_SESSION['m'];
$nom1=$_SESSION['m1'];
$prenom1=$_SESSION['m2'];
$titre1=$_SESSION['m3'];
$cat1=$_SESSION['m4'];
$ISBN1=$_SESSION['m5'];

$dat=date("d/m/Y");
//$dateRd=date("d")+4;
//$m=date("m");
//$y=date("Y");
function fonctionDeTemps(){
    $m=date("m");
    $y=date("Y");
    $jour=date("d")+4;
   switch ($m){
       case 1 :  if($jour>30)
                       {
                           $m++;
                           $jour=1;
                       }
                break;
       case 2 :  if($jour>28)
       {
           $m++;
           $jour=1;
       }
           break;
       case 3 :  if($jour>31)
       {
           $m++;
           $jour=1;
       }
           break;
       case 4 :  if($jour>30)
       {
           $m++;
           $jour=1;
       }
           break;
       case 5 :  if($jour>31)
       {
           $m++;
           $jour=1;
       }
           break;
       case 6  :  if($jour>30)
       {
           $m++;
           $jour=1;
       }
           break;
       case 7 :  if($jour>31)
       {
           $m++;
           $jour=1;
       }
           break;
       case 8 :  if($jour>31)
       {
           $m++;
           $jour=1;
       }
           break;
       case 9 :  if($jour>30)
       {
           $m++;
           $jour=1;
       }
           break;
       case 10 :  if($jour>31)
       {
           $m++;
           $jour=1;
       }
           break;
       case 11 :  if($jour>30)
       {
           $m++;
           $jour=1;
       }
           break;
       case 12 :  if($jour>31)
       {
           $m++;
           $jour=1;
       }
           break;
   }

   if ($m>12)
   {
       $y++;
       $m=1;
   }

    return ''.$jour.'/'.$m.'/'.$y.' ';
}
$dateR=fonctionDeTemps();
//$dateR=''.$dateRd.'/'.$m.'/'.$y.' ';

$bdd=new PDO('mysql:host=localhost;dbname=miniprojetlib;charset=utf8','root','');

$dd=$_SESSION['idd'];



$rec5=$bdd->prepare('INSERT INTO  res'.$dd.'(id,nom,prenom,code,titre,categorie,ISBN,DateReserve,DateRetour) VALUES(:id,:nom,:prenom,:code,:titre,:categorie,:ISBN,:DateReserve,:DateRetour)');
$rec5->execute(array(
    'id'=>$id1,
    'nom'=>$nom1,
    'prenom'=>$prenom1,
    'code'=>$id1,
    'titre'=>$titre1,
    'categorie'=>$cat1,
    'ISBN'=>$ISBN1,
    'DateReserve'=>$dat,
    'DateRetour'=>$dateR
));
$bdd->query('delete  FROM livre where ID='.$id1.' ');




$rec=$bdd->prepare('INSERT INTO emprunts(EMP_Date,EMP_DateRetour,EMP_CodeLivre,EMP_NumLecteur) VALUES(:EMP_Date,:EMP_DateRetour,:EMP_CodeLivre,:EMP_NumLecteur)');
$rec->execute(array(
    'EMP_Date'=>$dat,
    'EMP_DateRetour'=>$dateR,
    'EMP_CodeLivre'=>$ISBN1,
    'EMP_NumLecteur'=>$dd
));

echo '
<center>
    <h1>Confirmation de votre réservation</h1><br>
    <p>Votre réservation est confirmée sous la numero  <strong style="color: midnightblue">'.$id1.'</strong> <br>
  <hr>
   <table>
   <tr>
   <td>Date de réservation </td>
    <td> : </td>
   <td><strong style="color: lime">'.$dat.'</strong></td>
  
</tr>
 <tr>
   <td> Date du retour </td>
    <td> : </td>
   <td><strong style="color: red">'.$dateR.'</strong></td>
</tr>
</table>
  <hr>
    Vous pouvez revenir a la liste des livres disponible à la réservation en cliquant <a href="gestion.php">ici</a>
    </p>
    </center>
';










?>