<?php
    require_once("function/bd.php");
    if(isset($_POST["send"])){
         $errors = array();
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];
    $num_mtn=$_POST["mtn"];
    $num_orange=$_POST["orange"];
    $num_camtel=$_POST["camtel"];
    $num_nexttel=$_POST["nexttel"];
    $email=$_POST["email"];
    $type_relation=$_POST["relation"];
   
    if( $nom && $email ){
    $req = $pdo->prepare("SELECT * FROM contact WHERE (nom = ? and prenom = ?)  or email = ?");
    $req->execute([$nom, $prenom,$email]);
    $user = $req->fetch();
    if($user){
        $errors[]= "Cette personne ou ce numero de telephone est deja pris";
    }else{ 
        if(!empty($_FILES)){
        $name = $_FILES["avatar"]["name"];
        $extension = strrchr($name, ".");
        $extension_autoriser = array ('.jpg','.jpeg','.png');
        $file_tmp = $_FILES["avatar"]["tmp_name"];
        $file_dest = 'images/'.$name;
        if(in_array($extension, $extension_autoriser)){
            if(move_uploaded_file($file_tmp, $file_dest)){

                $requet = $pdo->prepare("INSERT INTO contact SET nom =? , prenom = ?, type_relation = ? ,email = ?,photo=?");
                $requet->execute([$nom,$prenom,$type_relation,$email,$name]);
                $req = $pdo->prepare("SELECT id FROM contact WHERE email = ?");
                $req->execute([$email]);
                while($user = $req->fetch()){
                    $id = $user->id;
                }
                if($num_camtel){
                    if($_POST["op"]=="camtel"){
                        $insert = $pdo->prepare("INSERT INTO  telephone SET numero=?, id=?,operateur = ?,est_principale = ?");
                        $insert->execute([$num_camtel,$id,$_POST["op"],1]);
                    }else{
                        $insert = $pdo->prepare("INSERT INTO  telephone SET numero=?, id=?,operateur = ?,est_principale = ?");
                        $insert->execute([$num_camtel,$id,$_POST["op"],0]);
                    }
                    
                }if($num_mtn){
                    if($_POST["op"]=="mtn"){
                        $insert = $pdo->prepare("INSERT INTO  telephone SET numero=?, id=?,operateur = ?,est_principale = ?");
                        $insert->execute([$num_mtn,$id,$_POST["op"],1]);
                    }else{
                        $insert = $pdo->prepare("INSERT INTO  telephone SET numero=?, id=?,operateur = ?,est_principale = ?");
                        $insert->execute([$num_mtn,$id,$_POST["op"],0]);
                    }
                }if($num_nexttel){
                    if($_POST["op"]=="nexttel"){
                        $insert = $pdo->prepare("INSERT INTO  telephone SET numero=?, id=?,operateur = ?,est_principale = ?");
                        $insert->execute([$num_nexttel,$id,$_POST["op"],1]);
                    }else{
                        $insert = $pdo->prepare("INSERT INTO  telephone SET numero=?, id=?,operateur = ?,est_principale = ?");
                        $insert->execute([$num_nexttel,$id,$_POST["op"],0]);
                    }
                }
                if($num_orange){
                    if($_POST["op"]=="orange"){
                        $insert = $pdo->prepare("INSERT INTO  telephone SET numero=?, id=?,operateur = ?,est_principale = ?");
                        $insert->execute([$num_orange,$id,$_POST["op"],1]);
                    }else{
                        $insert = $pdo->prepare("INSERT INTO  telephone SET numero=?, id=?,operateur = ?,est_principale = ?");
                        $insert->execute([$num_orange,$id,$_POST["op"],0]);
                    }
                }

               


            }else$errors[]= "erreur lors de envoy";
        }else $errors[]=" mauvais";
    }else $error[] = "veuillez choisir une image";
    }
}else $errors[]="Veuillez remplir tous les champs";
    }

    require_once("function/entete.php");
?>

<?php
if(!empty($errors)):
    ?>
    <div class="alert alert-danger">
        <?php foreach($errors as $error):
            ?>
            <li><?= $error; ?></li>
        <?php endforeach ?>
    </div>
<?php endif ?>
