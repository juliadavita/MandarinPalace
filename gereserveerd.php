<?php include_once 'header.php'; 
session_start();
$email = $_SESSION['email'];
?>

    <div class="reserveren-background">   
        <div class="black-space">
            <div>
                <img class="reserveren-logo" src="img/MP_logo_white.png">
                <table style="width:100%">
                    <tr class="reserveren-table">
                        <td><i class="fas fa-map-marker-alt"></i></td>
                        <td class="reserveren-table-padding">Nicolaïstraat 35 <br>
                        2517 SZ Den Haag</td>
                    </tr>
                    <tr class="reserveren-table">
                        <td><i class="fas fa-phone"></i></td>
                        <td class="reserveren-table-padding">070 360 66 16</td>
                    </tr> 
                </table>
            </div>
        </div>
            <div class="white-space">
                <div class="red-enveloppe">
                    <p>U heeft gereserveerd</p>
                </div>
                <div class="white-enveloppe">
                    <!-- <p>Er is een mail gestuurd naar <?php echo $email ?></p> -->
                </div>
            </div>
    </div> 


<?php include_once 'footer.php'; ?>

