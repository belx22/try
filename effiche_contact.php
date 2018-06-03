
<?php
    require_once("function/bd.php");

$req= $pdo->prepare("SELECT * FROM contact");
$req->execute();

require_once("function/entete.php");
?>

<table cellspacing="15px" border="5">

<?php
while ($user = $req->fetch()){


?>
<tr>
    <td>
        <a href="contact.php?email=<?=$user->email?>" > <img src="images/<?= $user->photo ?>" width="100px" height="100px" ></a>
    </td>
    <td>
        Nom:<?= $user->nom ?><br>
        Prenom:<?= $user->prenom ?><br>
       
    </td>
</tr>


<?php

}

?>
</table>

<a href="ajouter_contact.php">Cliquer ici pour ajouter un nouveau contact</a>
