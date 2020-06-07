<html>
<head>
    <title>Add Data</title>
</head>
 
<?php
//including the database connection file
require_once '../src/database.php'; 
 
if(isset($_POST['submit'])) {  
    $date = $_POST['date'];
    $time = $_POST['time'];
    $quantity = $_POST['quantity'];
    $name = $_POST['name'];
    $phonenumber = $_POST['phonenumber'];

        
    // checking empty fields
    if(empty($date) || empty($time) || empty($quantity) || empty($name) || empty($phonenumber)) {  
        if(empty($date)) {
            echo "<font color='red'>Date field is empty.</font><br/>";
        }
        if(empty($time)) {
            echo "<font color='red'>Time field is empty.</font><br/>";
        }
        
        if(empty($quantity)) {
            echo "<font color='red'>Number of people field is empty.</font><br/>";
        }
        
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($phonenumber)) {
            echo "<font color='red'>Phonenumber field is empty.</font><br/>";
        }

        //link to the previous page
        header("Location: admin_reservations.php");;
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($conn, "INSERT INTO reservation(date,time,quantity,name,phonenumber) VALUES('$date','$time','$quantity','$name','$phonenumber')");

        header("Location: admin_reservations.php");
    }
}
else { ?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mandarin Palace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/admin_stylesheet.css" /> 
      
</head>
<body>
    <div class="login-banner">
        <div class="option-background"> 
            <div class="login-header">
                <img src="../img/MP_logo_white.png" class="login-logo">
            </div>
            <div class="option-space">
                <form method="post">
                <form method="post" name="form1">
                <table border="0">
                    <tr> 
                        <td>Date</td>
                        <td><input type="date" name="date"></td>
                    </tr>
                    <tr> 
                        <td>Time</td>
                        <td><input type="text" name="time"></td>
                    </tr>
                    <tr> 
                        <td>Number of people</td>
                        <td><input type="text" name="quantity"></td>
                    </tr>
                    <tr> 
                        <td>Name</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr> 
                        <td>Phonenumber</td>
                        <td><input type="text" name="phonenumber"></td>
                    </tr>
                    <tr> 
                        <td></td>
                        <td><input type="submit" name="submit" value="Add"></td>
                    </tr>
                </table>
                </form>
                </form>
            </div>
        </div>
    </div>
</body>
<!-- <body>   
    <a href="admin_reservations.php">Home</a>
    <br/><br/>
 
    <form method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Date</td>
                <td><input type="date" name="date"></td>
            </tr>
            <tr> 
                <td>Time</td>
                <td><input type="text" name="time"></td>
            </tr>
            <tr> 
                <td>Number of people</td>
                <td><input type="text" name="quantity"></td>
            </tr>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Phonenumber</td>
                <td><input type="text" name="phonenumber"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="submit" value="Add"></td>
            </tr>
        </table>
    </form>

<?php } ?>
</body>
</html> -->
