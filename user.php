<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
include 'connect.php';
// $con = new mysqli('localhost', 'root', '', 'crud');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //    insert data
    $sql = "insert into `crudsys` (name, email, password) 
    values ('$name','$email','$password')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>
        alert('successed...');
        document.location.href='admin.php'
        </script>";
    } else {
        die(mysqli_error($con));
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
        .container {
            height: 100vh;
            background-color: #1690A7;

        }
    </style>

    <title>CRUD project</title>
</head>

<body>
    <div class="container mx-auto p-5">
        <h2 class="text-center"><span class="badge bg-light text-dark mt-5"> Fill Your Data </span></h2>
        php_sapi_name
        <form method="post" class="m-5">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="..." ; require>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="...">

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="...">

                </div>
            </div>

            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </form>

    </div>

</body>

</html>