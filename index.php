
<?php
$dat=date("d/m/Y");
echo $dat;
$datt=date("d");
echo $datt+4;

?>


<html>
<head>

    <title>miniprojetphplibrarivirteuelle</title>
</head>
<body style="background-color: #0c5460">
<center><h1>GESTION D'UNE LIBRAIRE</h1></center><br>
<div>
  <center>
      <img src="assets/img/user.png" width="100"><br>
      <form method="post" action="gestion.php">
          <table>
              <tr>
                  <td>Nom de lecteur</td>
                  <td><input type="text" name="nom"> </td>
              </tr>
              <tr>
                  <td>Mot de passe</td>
                  <td><input type="password" name="password"></td>
              </tr>
              <tr>
                  <td><input type="submit" value="Login"></td>
                  <td></td>
              </tr>
          </table>
      </form>
  </center>

</div>
<hr size="2" color="lime">
<center>

<table style="background-color: #0e90d2">
    <tr>
        <td>

            <a href="lecteur.php">lecteur
            <br>
                <img src="assets/img/aaa.png" width="100">
            </a>

        </td>
        <td>  </td>
        <td><a href="livre.php">livre
                <br>
                <img src="assets/img/aaaa.png" width="100"></a></td>
        <td><a href="">about
                <br>
                <img src="assets/img/aa.png" width="100"></a></td>
    </tr>
</table>
</center>
</body>
</html>
