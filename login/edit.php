<?php

require_once '../src/database.php'; 

if(isset($_POST['update']))
{    
    $id             =   $_POST['id'];
    $time           =   $_POST['time'];
    $quantity       =   $_POST['quantity'];
    $name           =   $_POST['name'];
    $phonenumber    =   $_POST['phonenumber'];    
    
    // checking empty fields
    if(empty($time) || empty($quantity) || empty($name) || empty($phonenumber)) {            
        if(empty($time)) {
            echo "<font color='red'>Time field is empty.</font><br/>";
        }
        
        if(empty($quantity)) {
            echo "<font color='red'>Number of persons field is empty.</font><br/>";
        }
        
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }        
        if(empty($phonenumber)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }  
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE reservation SET time='$time',
        quantity='$quantity',name='$name',phonenumber='$phonenumber' WHERE id=$id");
        // echo $name;
        
        // redirectig to the display page. In our case, it is index.php
        header("Location: admin_reservations.php");
    }
}
else{

//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM reservation WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $time = $res['time'];
    $quantity = $res['quantity'];
    $name = $res['name'];
    $phonenumber = $res['phonenumber'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form method="post">
        <table border="0">
            <tr> 
                <td>Time</td>
                <td><input type="text" name="time" value="<?= $time;?>"></td>
            </tr>
            <tr> 
                <td>Quantity</td>
                <td><input type="text" name="quantity" value="<?= $quantity;?>"></td>
            </tr>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?= $name;?>"></td>
            </tr>
            <tr> 
                <td>Phonenumber</td>
                <td><input type="text" name="phonenumber" value="<?= $phonenumber;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?= $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
<?php } ?>
</body>
</html>
