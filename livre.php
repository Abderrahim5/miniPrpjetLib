<html>
<head>

</head>
<body style="background-color: #0c5460">
<h1> Enregestrement d'un Livre</h1><br>
<form method="post" action="page2.php">
    <table>
        <tr>
            <td>Nom de l'auteur</td>
            <td><input type="text" name="nom"> </td>
        </tr>
        <tr>
            <td>Prénom de l'auteur</td>
            <td><input type="text" name="prénom"></td>
        </tr>
        <tr>
            <td>Titre</td>
            <td><input type="text" name="titre"></td>
        </tr>
        <tr>
            <td>Catégorie</td>
            <td><select name="categorie">
                    <option>Roman</option>
                    <option>Science-fiction</option>
                    <option>Policier</option>
                    <option>Autre</option>
                </select></td>
        </tr>
        <tr>
            <td>Numéro ISBN</td>
            <td><input type="text" name="ISBN"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Enregistrer"></td>
            <td></td>
        </tr>
    </table>
</form>
</body>
</html>