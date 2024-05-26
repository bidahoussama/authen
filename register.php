<?php
include "connect.php";
$password_error = "";
$champ_error = "";
$success = "";
if (isset($_POST["register"])) {
    extract($_POST);
    if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($pass_confirm)) {
        $champ_error = "les Champ est vide";
    } else {
        if ($password != $pass_confirm) {
            $password_error = "Password not same";
        } else {
            $query = "INSERT into utilisateur values(null,'$nom','$prenom','$email','$password')";
            mysqli_query($con, $query);
            $success = "utilisateur bien ajouter";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f5f5;
        }

        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-check-label {
            margin-left: 5px;
        }

        .btn-primary {
            background: #007bff;
            border: none;
            width: 100%;
        }

        .genre-group {
            display: flex;
            justify-content: space-between;
        }

        .genre-group .btn {
            flex: 1;
            margin: 0 5px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php  include "menu.php";  ?>
    <div class="container w-25 mt-5">
        <div class="form-header">
            <h2>Register Now</h2>
            <?php
            if ($champ_error) {
                echo "<div class='alert alert-danger'>$champ_error</div> ";
            } else {
                echo "";
            }
            if ($success) {
                echo "<div class='alert alert-success'>$success</div> ";
            }else{
                echo "";
            }
            ?>
        </div>
        <form method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" placeholder="Enter last name">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Enter first name">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="pass_confirm" class="form-control" id="confirm-password" placeholder="Confirm Password">
                <?php echo "<p class='text-danger'>$password_error</p>"  ?>
            </div>
            <button name="register" type="submit" class="btn btn-primary mt-3">Register</button>
        </form>
    </div>

</body>

</html>