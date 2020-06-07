<?php include_once 'header.php'; ?>

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
                <div class="white-space-inhoud">
                    <h1>Reserveren</h1>
                    <form method="POST" action="src/reserve.php">
                        <div id="wpr-table">
                            <div class="table">
                                <p>Name:</p>
                                <input class="input-reserve" type="text" name="name" placeholder="Jane Doe">
                                <br>
                                <p>Date:</p>
                                <input class="input-reserve" type="date" name="date" placeholder="07-07-2019">
                                <br>
                                <p>Time:</p> 
                                <br>
                                <div class="time-dropdown" style="width:200px;">
                                    <select name="time">
                                        <option value="0">Select time:</option>
                                        <option value="17:00">17:00</option>
                                        <option value="17:30">17:30</option>
                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>
                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>
                                        <option value="20:00">20:00</option>
                                        <option value="20:30">20:30</option>
                                        <option value="21:00">21:00</option>
                                    </select>
                                    </div>
                              
                            </div>
                            <div class="table"> 
                                <p>Number of people:</p>
                                <input class="input-reserve" type="text" name="quantity" placeholder="3" maxlength="2">
                                <br>
                                <p>Phone number:</p>
                                <input class="input-reserve" type="text" name="phonenumber" maxlength="10" placeholder="0612345678">
                                <br>
                                <p>Email:</p>
                                <input class="input-reserve" type="email" name="email" placeholder="name@hotmail.com">
                                <br>
                            </div>
                        </div>
                        <input class="button-submit" type="submit" name="submit" value="submit">
                    </form> 
                </div>
            </div>
    </div> 


<?php include_once 'footer.php'; ?>