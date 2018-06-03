<?php

require_once("function/entete.php");
?>
        <h1>Ajouter un nouveau contact</h1>
        <form method="POST" action="ajout.php" enctype="multipart/form-data">
            <table cellspacing="5px">
                <tr>
                    <td>Photo</td>
                    <td><input type="file" name="avatar"> </td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td><input type="text" name="nom"></td>
                </tr>
                <tr>
                        <td>Prenom</td>
                        <td><input type="text" name="prenom"></td>
                    </tr>
                    <tr>
                            <td>Type de relation</td>
                            <td><select name="relation" id="">
                                    <option value="amis">Amis</option>
                                    <option value="famille">Famille</option>
                                    <option value="autres">Autres</option>
                            </select></td>
                        </tr>
                        <tr>
                                <td>Email</td>
                                <td><input type="email" name="email"></td>
                            </tr>
                            <tr>
                                    <td >Telephone</td> 
                                    <td align="center">Choisir la sim principale</td>
                            </tr>
                            <tr>
                                    <td align="right">Orange:<input type="text" name="orange"></td>
                                    <td align="center"> <input type="radio" name="op" value="orange"><br> </td>
                            </tr>
                           
                             <tr>
                                 
                                <td align="right">Mtn:<input type="text" name="mtn">  </td>
                                <td align="center"><input type="radio" name="op" value="mtn"><br></td>  
                            </tr>
                            <tr>
                                <td align="right">Nexttel:<input type="text" name="nexttel"></td>
                                <td align="center"><input type="radio" name="op" value="nexttel"><br></td>
                            </tr>
                            <tr>
                              <td align="right">Camtel:<input type="text" name="camtel">
                              </td>
                              <td align="center"><input type="radio" name="op" value="camtel"><br></td>  
                            </tr>                             
                                <tr>
                                        <td><input type="submit" name="send" value="Valider"><input type="reset" value="Annuler"></td>
                                    </tr>
            </table>

        </form> 
      
        <?php

require_once("function/pied.php");
?>
   