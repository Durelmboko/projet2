<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adherant</title>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <?php include('../inc/navbar.php') ;?>   
    <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
    <div class='alert alert-success corner-radius container mt-3'>
      <p>livraison ajouté avec succés</p>
    </div>
    <?php unset($_GET['success']);
    } ?>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">
                GESTION LIVRAISON
            </div>
            <div class="conatainer mt-3">
      <div class="card-body">
        <form method = "POST" action = "../traitements/livrer.php" >
          
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">id</label>
            <input type="number" name="id" class="form-control" id="">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">codeA</label>
            <input type="number" name="codeA" class="form-control" id="">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">dateliv</label>
            <input type="number" name="dateliv" class="form-control" id="">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">qteliv</label>
            <input type="number" name="qteliv" class="form-control" id="">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">prixliv</label>
            <input type="number" name="prixliv" class="form-control" id="">
          </div>
          
          <button type="submit" name="valider" id="bouton" class="btn btn-primary">Enregistrer</button>
        </form>
      </div>

    </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>