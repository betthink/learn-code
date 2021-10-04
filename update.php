<?php
include 'connect.php';
$id = $_GET['updateid'];

// show value on input field in update data

$query = "SELECT * FROM `crudsys` where `no`=$id";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($res);
$name = $row['name'];
$email = $row['email'];
$password = $row['password'];

// input and change
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //    insert data
    $sql = "UPDATE `crudsys` SET `no` = '$id', `name` = '$name', `email` = '$email', `password` = '$password' WHERE `crudsys`.`no` = $id";
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

    <title>CRUD project</title>
</head>

<body>
    <div class="container my-5">

        <h2 class="text-center"><span class="badge bg-light text-dark"> Fill Your Data </span></h2>


        <form method="post">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="name please!" value="<?= $name; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email please!" value="<?= $email; ?>">

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="password please!" value="<?= $password; ?>">
                    <div id="emailHelp" class="form-text">please Remember your password wisely</div>
                </div>
            </div>

            <button type="submit" class="btn btn-success" name="submit">Update</button>
        </form>

    </div>

</body>

</html>