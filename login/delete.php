<?php

require_once '../src/database.php'; 

$id = $_GET['id'];
$delete = "DELETE FROM `reservation` WHERE id = $id";

if (isset($id)){
    $destroy = mysqli_query($conn, $delete);
}

header("Location: admin_reservations.php");

