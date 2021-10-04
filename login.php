<?php
session_start();

include 'connect.php';
// cookie========================= 
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];
    // take username by id
    $result = mysqli_query($con, "SELECT username from loginsys where id=$id");
    $row = mysqli_fetch_assoc($result);


    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}


if (isset($_SESSION["login"])) {
    header("Location: admin.php");
}

if (isset($_POST["login"])) {


    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($con, "SELECT * from loginsys where username='$username'");

    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // set session==================
            $_SESSION["login"] = true;
            // remember me

            if (isset($_POST["remember"])) {
                setcookie('id', $row["id"], time() + 120);
                setcookie('key', hash('sha256', $row["username"]), time() + 120);
            }

            header("location: admin.php");
            exit;
        }
    }
    $error = true;
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        body {
            background: #1690A7;

        }

        a {
            text-decoration: none;
            color: #fff;
        }

        * {
            font-family: sans-serif;
            box-sizing: border-box;
        }

        form {
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            margin: auto;


        }
    </style>

    <title>Login</title>
</head>

<body>
    <div class="container mt-5">


        <!-- form login -->

        <form class="sm" method="post">

            <h2 class="text-center">sign in</h2>
            <div class="mb-3">
                <label for="Username" class="form-label">Username </label>
                <input type="Username" class="form-control" id="Username" name="username">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>


            <button type="submit" class="btn btn-primary" name="login">login</button>
            <button class="btn btn-success"><a href="regist.php"> Buat akun!</a></button>

            <!-- jikalau password salah=================== -->
            <?php if (isset($error)) : ?>
                <p>password salah!!</p>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>