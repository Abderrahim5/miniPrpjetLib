<?php
session_start();
?>

<html>
<head>

</head>
<body style="background-color: #0c5460">
<h1>Gestion de lecteur</h1><br>
<?php
$nom=$_POST['nom'];
$password=$_POST['password'];
$dd=0;

$bdd23=new PDO('mysql:host=localhost;dbname=miniprojetlib;charset=utf8','root','');
$rep = $bdd23->query('SELECT ID, Nom,motdepasse FROM lecteur');
$nom1="false";
$password1="false";
while ($do = $rep->fetch()) {
    if ($do['Nom']==$nom){$nom1="true";}
    if ($do['motdepasse']==$password){$password1="true"; $num=$do['ID'];  $dd=$_SESSION['idd']=$do['ID'];}
   // $dd=$_SESSION['idd']=$do['ID'];
}
//$dd=$_SESSION['idd'];
if(isset($nom) && isset($password)) {
    if ($nom1 == "true" && $password1 == "true") {


        echo '
        <p>Le lecteur Numéro <strong style="color: #533f03">'.$num.'</strong> est reconnu</p>
        <h3>Voila laa liste des ouvrages disponibles à la réservation</h3><br>
        <table border="2" style="background-color: #1e7e34">
        <tr>
        <td>Code de mivres </td>
        <td>Nom  acteur </td>
        <td>Prénom  acteur </td>
        <td>Titre </td>
        <td>Catégorie </td>
         <td>ISBN </td>
          <td>lien </td>
        </tr>
        ';

        $y=0;
        $bdd2=new PDO('mysql:host=localhost;dbname=miniprojetlib;charset=utf8','root','');
        $rep = $bdd2->query('SELECT ID,Nom,prenom,titre,categorie,ISBN FROM livre');

        while ($do = $rep->fetch()) {
            $tab01[$y] = $do['ID'];
            $tab0[$y] = $do['Nom'];
            $tab10[$y] = $do['prenom'];
            $tab11[$y] = $do['titre'];
            $tab12[$y] = $do['categorie'];
            $tab13[$y] = $do['ISBN'];
            $y++;
        }

        for ($j = 0; $j < count($tab10); $j++) {
            echo "<form method='post' action='reserver.php'>";
            echo "<tr>";
            echo "<td><input type='text' value='$tab01[$j]' name='mom' readonly > </td>   ";
            echo "<td><input type='text' value='$tab0[$j]' name='mom1' readonly> </td>   ";
            echo "<td><input type='text' value='$tab10[$j]' name='mom2' readonly> </td>   ";
            echo "<td><input type='text' value='$tab11[$j]' name='mom3' readonly> </td>   ";
            echo "<td><input type='text' value='$tab12[$j]' name='mom4' readonly> </td>   ";
            echo "<td><input type='text' value='$tab13[$j]' name='mom5' readonly> </td>   ";


            echo "<td><input name='reserve' type='submit' value='reserve'  ></td>   ";


            echo "</tr>
                     </form>";
        }





        echo '
        </table>
        <h3>Voici la liste de vos reservations</h3>
        <table border="3" style="background-color: #533f03">
        <tr>
        <td>Code de mivres </td>
        <td>Nom  acteur </td>
        <td>Prénom  acteur </td>
        <td>Titre </td>
        <td>Catégorie </td>
          <td>ISBN </td>
          <td>Date Reserve </td>
          <td>Date Retour </td>
        </tr>
      
    ';











        $rep8 = $bdd2->query('SELECT nom,prenom,code,titre,categorie,ISBN,DateReserve,DateRetour FROM res'.$dd.' ');
$y1=0;
        while ($do = $rep8->fetch()) {

            $tab00[$y1] = $do['nom'];
            $tab100[$y1] = $do['prenom'];
            $tab010[$y1] = $do['code'];
            $tab110[$y1] = $do['titre'];
            $tab120[$y1] = $do['categorie'];
            $tab130[$y1] = $do['ISBN'];
            $tab1301[$y1] = $do['DateReserve'];
            $tab1302[$y1] = $do['DateRetour'];
            $y1++;
        }

        for ($j = 0; $j < count($tab100); $j++) {
            echo "<tr>";
            echo "<td>$tab010[$j] </td>   ";
            echo "<td>$tab00[$j] </td>   ";
            echo "<td>$tab100[$j] </td>   ";
            echo "<td>$tab110[$j] </td>   ";
            echo "<td>$tab120[$j] </td>   ";
            echo "<td>$tab130[$j] </td>   ";
            echo "<td>$tab1301[$j] </td>   ";
            echo "<td>$tab1302[$j] </td>   ";
            echo "</tr>";
        }

            echo '  </table>';
    }else echo '
            Le lecteur ne pas recomnu <br>
Cliquez <a href="index.php">ici</a> pour tenter une nouvelle identification<br>
<h1> Enregestrement d\'un Lecteur</h1><br>
<p>Si vous été un nouveaulecteur , veiller enregestrer en remplissant le formulaire ci-dessous:</p>


        <form method="post" action="page1.php">
    <table>
        <tr>
            <td>Nom</td>
            <td><input type="text" name="nom"> </td>
        </tr>
        <tr>
            <td>Prénom</td>
            <td><input type="text" name="prénom"> </td>
        </tr>
        <tr>
            <td>Mot de passe</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>Adresse</td>
            <td><input type="text" name="adresse"></td>
        </tr>

        <tr>
            <td>Code Postal</td>
            <td><input type="text" name="postal"></td>
        </tr>
        <tr>
            <td>Ville</td>
            <td><input type="text" name="ville"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Valider"></td>
            <td></td>
        </tr>
    </table>
</form>
        ';
}

$rep4 = $bdd23->query('SELECT id,nom,prenom,categorie,titre,ISBN,DateRetour FROM res'.$dd.' ');

        while ($do = $rep4->fetch()) {
$zz=0;
            if ( $do['DateRetour']==date("d/m/Y ")){
            $zz=$do['id'];
               // $bdd23->query('delete  FROM res'.$dd.'where  id='.$do['id'].' ');

                //supprimer dans 2 eme tableau
                //ajouter a la premier table
                $rec99=$bdd23->prepare('INSERT INTO livre(Nom,prenom,titre,categorie,ISBN,reserve) VALUES(:Nom,:prenom,:titre,:categorie,:ISBN,:reserve)');
                $rec99->execute(array(
                        'ID'=>$do['id'],
                    'Nom'=>$do['nom'],
                    'prenom'=>$do['prenom'],
                    'titre'=>$do['titre'],
                    'categorie'=>$do['categorie'],
                    'ISBN'=>$do['ISBN'],
                    'reserve'=>1

                ));


            }

                    }
        $bdd23->query('delete  FROM res'.$dd.' where id='.$zz.' ');




?>

</body>
</html>