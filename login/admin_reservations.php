<?php
session_start();
$lastDate = '';
$admin_page = true;

if(!isset($_SESSION['username'])) {
    // redirect to login page
    header('Location: index.php');
    exit;
}

require_once '../src/database.php';

$sql = "SELECT * FROM `reservation` ORDER BY date, time";
$query = mysqli_query($conn, $sql)
    or die ('Error '.mysqli_error($conn). ' with query' .$sql);
while ($row = $query->fetch_assoc()) {
    $reservations[] = $row;
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mandarin Palace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/admin_stylesheet.css" /> 
      
</head>
<body>
    <div class="admin-banner">
        <div class="admin-background"> 
            <div class="admin-header">
                <div class="admin-header-imagecontainer">
                    <img src="../img/MP_logo_white.png" class="login-logo">
                </div>
                <div class="admin-header-buttoncontainer">
                    <div class="add-button-area"><a class="add-button" href="add.php">Toevoegen</a></div>
                </div>
            </div>
            <table class="table-reserveringen">
                <tbody>
                    <?php 
                    for($i=0; $i<count($reservations); $i++){ ?>
                    <?php if ($lastDate != $reservations[$i]['date']) { ?>
                        <tr>
                            <td colspan="8">
                                <div class="date-keeper">
                                    <div class="date-keeper-text">
                                        <?= date("l: F jS, Y", strtotime($reservations[$i]['date'])) ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr> 
                        <td class="time-space-table"><?= $reservations[$i]['time']; ?></td>
                        <td class="space-table"><?= $reservations[$i]['quantity']; ?>P</td>
                        <td class="space-table"><?= $reservations[$i]['name']; ?></td>
                        <td class="space-table"><?= $reservations[$i]['phonenumber']; ?></td>
                        <td><input type="text" placeholder="table"></td>
                        <td class="space-table"><a href= "#" class="inside-button"onclick="colorToggle(this)"</a></td>
                        <td class="space-table"><a href="edit.php?id=<?= $reservations[$i]['id'] ?>">Edit</a></td>
                        <td class="space-table"><a href="delete.php?id=<?= $reservations[$i]['id'] ?>">Delete</a></td>
                    </tr>
                    <?php $lastDate = $reservations[$i]['date'] ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<?php include_once '../footer.php'; ?>