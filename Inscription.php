<?php
require_once("./function/db.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INscription</title>
</head>
<body>
    <form action="" method="post">
    <pre>
           <label for="name">Prénom : </label>
           <input type="text" name="name" id="name" required>
           <label for="lastname">Nom : </label>
           <input type="text" name="lastname" id="lastname" required>
           <label for="username">¨Pseudo</label>
           <input type="text" name="username" id="username" required>
           <label for="password">Code : </label>
           <input type="password" name="password" id="password" required pattern="^[0-9]{4}" maxlenght=10>
           <label for="confirm_password"> Confirmation du code</label>
           <input type="password" name="Confirm_password" id="confirm" onchange="modifyPassword()" required pattern="^[0-9]{4}" maxlenght=4>
           <br>
           <input type="submit" value="cree un utilisateur">
</pre> 
</form>
<?php
        if (isset($_POST) &&n !empty($_POST)) {
            $select = $bdd->prepare('SELECT * FROM atm WHERE username=?');
            $select->execute(array( $_POST['username']));
            $select = $select->fetchall();
            if (count($select) <= 0) {
$insert = $bdd->prepare('INSERT INTO atm(prenom, nom, username, code) VALUE (?,?,?,?,)');
            $insert->execute(array(
                $_POST['name'],
                $_POST['lastname'],
                $_POST['username'],
                $_POST['password']
             ));
            }else{
                echo "<script> alert('Le nom d\'utilisateur est déja utilisé') </script>";
            }
            
           
        }  
        
?> 
    <script>
        function modifyPassword() {
            
        }
    </script>         
</body>
</html>