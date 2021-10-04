<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
include 'connect.php';
$sql = "Select * from `crudsys`";


if (isset($_POST["show"])) {
    $sql = "Select * from `crudsys`";
}
if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];
    $sql = "SELECT * from `crudsys` where `name` LIKE 
    '%$keyword%' OR `email` LIKE
    '%$keyword%' OR `password` LIKE
    '%$keyword%'
    ";
}

$result = mysqli_query($con, $sql);

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
        @import "bootstrap/scss/variables";

        * {
            color: #fff;
        }

        input {
            color: #000;
        }

        a {
            text-decoration: none;
        }

        .container {
            height: 100vh;
            background-color: #1690A7;
        }
    </style>

    <title>Admin-configure</title>
</head>

<body>
    <div class="container ">
        <button class="btn btn-success my-3"><a href="user.php" class="text-light">Add user</a></button>
        <button class="btn btn-danger my-3 float-end"><a href="logout.php" class="text-light">Logout</a></button>
        <form action="" method="post" class="mb-3">
            <input type="text" name="keyword" placeholder="find here..." autofocus>
            <button type="submit" name="cari" class="btn btn-dark">find</button>
            <!-- <button class="btn btn-danger my-3" name="show">show all</button> -->
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">action</th>
                </tr>
            </thead>

            <tbody>
                <?php

                $i = 1;
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['no'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $password = $row['password'];


                        echo '
                        <tr>
                        <th>' . $i . '</th>
                        <td>' . $name . '</td>
                        <td>' . $email . '</td>
                        <td>' . $password . '</td>
                        <td>
                        <button class="btn btn-success"><a href="update.php?updateid=' . $id . '" class="text-light">update</a></button>
                        
                        <button class="btn btn-danger"> <a href="delete.php?deleteid=' . $id . '" class="text-light">
                       delete
                       </a>
                        </button>
                        </td>
                        
                       
                        
                        </tr>';
                        $i++;
                    }
                }
                ?>
            </tbody>

        </table>
    </div>
</body>

</html>