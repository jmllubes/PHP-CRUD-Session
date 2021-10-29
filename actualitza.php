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
    <?php @session_start();
    $j = $_REQUEST['actualitza']; ?>
    <h2 class="text-center pt-5 pb-3">Modificar Productes</h2>

    <form class="container mt-5 mb-5" action="actualitza.php" method="post" enctype="multipart/form-data">
        <label for="">Codi</label>
        <input class="form-control" type="number" name="codi" id="" <?php echo "value=".$_SESSION['codi'][$j];?> required><br>
        <label for="">Nom</label>
        <input class="form-control" type="text" name="nom" id="" <?php echo "value=".$_SESSION['nom'][$j];?> required><br>
        <label for="">Preu</label>
        <input class="form-control" type="number" name="preu" id="" <?php echo "value=".$_SESSION['preu'][$j];?> required><br>
        <Label>Foto producte</Label>
        <input class="form-control" type="file" name="foto" id="" <?php echo "value=".$_SESSION['foto'][$j];?> required><br>
        <input class="btn btn-primary" type="submit" name="actualitza" value="Actualitzar">

    </form>
    <?php 
    if(isset($_REQUEST["actualitza"])){
        $_SESSION["codi"][$j] = $_REQUEST["codi"];
        $_SESSION["nom"][$j] = $_REQUEST["nom"];
        $_SESSION["preu"][$j] = $_REQUEST["preu"];
        copy($_FILES['foto']['tmp_name'], "img/" . $_FILES['foto']['name']);
        $_SESSION["foto"][$j] = "img/" . $_FILES['foto']['name'];
        header("Location:index.php");


    }

?>

    </body>

</html>