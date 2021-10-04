<?php
include 'connect.php';
if (isset($_GET['deleteid'])) {
    $idd = $_GET['deleteid'];

    $sql = "delete from `crudsys` where no=$idd";
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
