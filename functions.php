<?php
$con = new mysqli('localhost', 'root', '', 'crud');

// input register=================
function register($data)
{
    global $con;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($con, $data["password"]);
    $password2 = mysqli_real_escape_string($con, $data["password2"]);
    // kondisi jika username sama===============
    $result = mysqli_query($con, "SELECT username from loginsys where username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username already taken!');
        </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
        alert('sorry, your password not match');
        </script>";
        return false;
    }


    $password = password_hash($password, PASSWORD_DEFAULT);
    // tambah data ke database=====================
    mysqli_query($con, "INSERT INTO `loginsys` (`username`, `password`) VALUES ('$username', '$password');");
    return mysqli_affected_rows($con);
}
