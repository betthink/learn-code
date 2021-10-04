<?php

require 'functions.php';
if (isset($_POST["regist"])) {
    if (register($_POST) > 0) {
        echo "
<script>
    alert('Berhasil');
</script>";
    } else {
        echo mysqli_error($con);
    }
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

    <title>Registrasi-</title>
</head>

<body>
    <div class="container mt-5">


        <!-- form login -->

        <form class="sm" method="post">

            <h2 class="text-center">sign up</h2>
            <div class="mb-3">
                <label for="Username" class="form-label">Username/Email</label>
                <input type="Username" class="form-control" id="Username" name="username">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password2">
            </div>

            <button type="submit" class="btn btn-primary" name="regist">Submit</button>
            <button class="btn btn-success"><a href="login.php"> login!</a></button>

        </form>
    </div>
</body>

</html>