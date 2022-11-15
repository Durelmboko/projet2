

<?php
session_start();
@$nom=$_POST['nom'];	
@$prenom=$_POST['prenom'];
@$login=$_POST['login'];
@$pass=$_POST['pass'];
@$repass=$_POST['repass'];
@$valider=$_POST['valider'];
$message='';
if(isset($valider)){
    if(empty($nom)) $message="<li>Nom ivalide</li>";
    if(empty($prenom)) $message="<li>prenom ivalide</li>";
    if(empty($login)) $message="<li>login ivalide</li>";
    if(empty($pass)) $message="<li>pass ivalide</li>";
    if($pass!=$repass) $message="<li>pass identique</li>";
    if(empty($message)){
        include("connexion.php");
        $res=$connexion->prepare("select id from users where login=? limit 1");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute(array($login));
        $tab=$res->fetchAll();
        if(count($tab)>0)
        $message="<li>login existe deja</li>";
        else{
         
  $ins="insert into users(id,date, nom,prenom,login,pass)
             values('',now(),'$nom','$prenom','$login',md5('$pass'))";
             $connexion->exec($ins);
              
            header("location:login.php");
        }
      
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion des elections du Senegal</title>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="../public/css/black.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                GESTION ARTICLE
            </div>
  <form method="POST" action="" enctype="multipart/form-data">
  <fieldset>
   <legend align="center" style="color: #e5ec20"><h1>* Bienvenu dans le site Electoral *</h1></legend>
    <pre>
      <div id="depcontenu">

              <label for="nom">nom *</label>
            <input type="text" name="nom" id="nom" class="input" placeholder="votre identifiant "><br>
          
              <label for="prenom">prenom*</label>
            <input type="prenom" name="prenom" id="prenom" class="input" placeholder="votre password " ><br>
            <label for="login">login*</label>
            <input type="login" name="login" id="login" class="input" placeholder="votre password "><br>
            <label for="pass">Mot de passe *</label>
            <input type="password" name="pass" id="pass" class="input" placeholder="votre password "><br>
            <label for="pass">Conformer Mot de passe *</label>
            <input type="password" name="repass" id="repass" class="input" placeholder="votre password "><br>

     <input type="submit"  value="valider" name="valider" id="valider">       <input type="reset"  value="annuler" id="depbot">
      </div>
    </pre>
  </fieldset>
  </form> 
  <?php if(!empty($message)){?>
  <div id="message"><?php echo $message?></div>
  <?php } ?> 
</body>
</html>
