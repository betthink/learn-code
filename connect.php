<?php
$con = new mysqli('localhost', 'root', '', 'crud');
// $query = "SELECT * FROM `crudsys`";
function query($query)
{
    global $con;
    $result = mysqli_query($con, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};

function cari($keyword)
{
    $query = "Select * from `crudsys` where `name`='$keyword'";
    return query($query);
}
// if($con) {
//     echo " connection succesfull";
// } else {
//     die(mysqli_error($con));
// }

