<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Productes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <h2 class="text-center pt-5 pb-3">Afegir Productes</h2>

    <form class="container mt-5 mb-5" action="index.php" method="post" enctype="multipart/form-data">
        <label for="">Codi</label>
        <input class="form-control" type="number" name="codi" id="" required><br>
        <label for="">Nom</label>
        <input class="form-control" type="text" name="nom" id="" required><br>
        <label for="">Preu</label>
        <input class="form-control" type="number" name="preu" id="" required><br>
        <Label>Foto producte</Label>
        <input class="form-control" type="file" name="foto" id="" required><br>
        <input class="btn btn-primary" type="submit" name="registrar" value="Registrar">

    </form>
    <?php
    session_start();
    if (isset($_REQUEST["registrar"])) {
        $_SESSION["codi"][] = $_REQUEST["codi"];
        $_SESSION["nom"][] = $_REQUEST["nom"];
        $_SESSION["preu"][] = $_REQUEST["preu"];
        copy($_FILES['foto']['tmp_name'], "img/" . $_FILES['foto']['name']);
        $_SESSION["foto"][] = "img/" . $_FILES['foto']['name'];
    }
    ?>
<h2 class="text-center pt-5 pb-3">Mostrar Productes</h2>
<div class="container mt-5 mb-5">   
<table class="table">
        <tr>
            <th>Codi</th>
            <th>Nom</th>
            <th>Preu</th>
            <th>Foto</th>
            <th>Actualitzar</th>
            <th>Esborrar</th>
        </tr>
<?php
if(isset($_SESSION["foto"])){
    for ($i=0; $i < sizeof($_SESSION['codi']); $i++) { 
        echo "<tr>"; //crea fila
        echo "<td>" . $_SESSION['codi'][$i] . "</td>"; //primera columna
        echo "<td>" . $_SESSION['nom'][$i] . "</td>"; //segona
        echo "<td>" . $_SESSION['preu'][$i]."</td>"; //quarta
        echo "<td><img src='" . $_SESSION['foto'][$i] . "'  width=\"50\" height=\"60\"></td>"; //sisena
        echo "<td><a href=\"actualitza.php?actualitza=$i\">Actualitza</a></td>";
        echo "<td><a href=\"esborra.php?esborra=$i\">Esborra</a></td>";
        echo "</tr>"; //tanco fila
    
  }     
   } 

?>
    </table>
    </div> 
    <form class="container mt-5 mb-5" action="index.php">
  <input class="btn btn-primary" type="submit" name="unset"
         value="Esborrar">
</form><?php
    if(isset($_REQUEST["unset"])){
      unset($_SESSION['codi']);
      unset($_SESSION['origen']);
      unset($_SESSION['desti']); 
      unset($_SESSION['preu']);
      unset($_SESSION['foto']);
      header("Location:index.php");
    
    }
    ?>
</body>

</html>