<?php  
    if (!session_start()) {
        header("location:login.php");
    }else{
    if (isset($_POST["deconecter"])) {
        session_destroy();
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <form method="post" action="">
        <h1><?php echo $_SESSION["nom"] . " " . $_SESSION["prenom"] ?></h1>
        <button name="deconecter" class="btn btn-danger">deconecter</button>
    </form>
</body>

</html>
<?php  }  ?>