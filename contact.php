<?php
    require_once("function/bd.php");

$req= $pdo->prepare("SELECT * FROM contact WHERE email = ?");
$req->execute([$_GET["email"]]);

require_once("function/entete.php");
?>

<table cellspacing="15px" align="center">

<?php
while ($user = $req->fetch()){


?>
<tr>
    <td>
        <a href="contact.php?email=<?= $user->email ?>" ><img src="images/<?= $user->photo ?>" width="300px" height="300px" ></a>
    </td>
    <td>
        Nom:<?= $user->nom ?><br>
        Prenom:<?= $user->prenom ?><br>
        Email:<?= $user->email ?><br>
        Type de relation: <?= $user->type_relation ?>
    </td>
</tr>
<tr>
    <td><input type="submit" value="Editer" name="edit"></td>
    <td><input type="submit"value="Suprimer" name="sup"></td>
</tr>

<?php

}

?>

</table>

