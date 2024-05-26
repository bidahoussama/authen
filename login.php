<?php
include "connect.php";
$donnee_error = "";
$email_error = "";
$password_error = "";
$success = "";
if (isset($_POST["login"])) {
    extract($_POST);
    if (empty($email) || empty($password)) {
        $email_error = "Saisir une email";
        $password_error = "Saisir une password";
    } else {
        $query = "SELECT * from utilisateur where email = '$email' and password = '$password'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 0) {
            $donnee_error = "You don't have an account please";
        } else {
            $row = mysqli_fetch_assoc($result);
            $success = "Welcome back";
            session_start();
            $_SESSION["email"] = $row["email"];
            $_SESSION["nom"] = $row["nom"];
            $_SESSION["prenom"] = $row["prenom"];
            header("location:affichage.php");
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
    <?php include "menu.php";  ?>
    <div class="container w-25 mt-5">
        <div class="form-header">
            <h2>Login Now</h2>
            <?php
            if ($donnee_error) {
                echo "<div class='alert alert-danger'>$donnee_error <a href='register.php'>Register</a></div> ";
            } else {
                echo "";
            }
            if ($success) {
                echo "<div class='alert alert-success'>$success</div> ";
            } else {
                echo "";
            }
            ?>
        </div>
        <form method="post">
            <div class="form-group my-3">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                <?php
                if ($email_error) {
                    echo "<p class='text-danger'>$email_error</p>";
                }
                ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <?php
                if ($password_error) {
                    echo "<p class='text-danger'>$password_error</p>";
                }
                ?>
            </div>
            <button name="login" type="submit" class="btn btn-primary mt-3">Login</button>
        </form>
    </div>

</body>

</html>