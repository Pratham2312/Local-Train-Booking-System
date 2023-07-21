<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}
include ('config.php');



if(isset($_POST['submit'])){
  $TransactionID = $_POST['TransactionID'];
  //$Destination = $_POST['Destination'];
  if(!empty($TransactionID)){
    $insert = "insert into `ticket`  (TransactionID) values ('$TransactionID')";
      $result = $conn->query($insert); 
      if($result){
        echo "<script>window.open('ticket.php','_self') </script>";
      }  
       } 
       } 
?> 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/paymentstyle.css">
    <title>Apli Local</title>
    
  </head>

  <body>
  <header>
        <nav class="navbar">
            <ul>
              <li class="Apli"><img src="css/images/logo.png" class="nav-img" alt=""></li>
              <li>Apli Local</li>
                <li><a href="home.php">Home</a></li>
                <!-- <li><a href="myTickets.html">My Tickets</a></li> -->
                <li><a href="contactUs.html">Contact Us</a></li>                
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
                  </li>
               
            </ul>
        </nav>
    </header>
    <div>
      <h3>Ticket Fare is: Rs.25 /-</h3>
    </div>
    <div class="center">
      <img src="css/images/barcode2.jpeg" />
      <form action="" method="post">
      <p>After Payment Please Fill the TransactionID </p>
        <label for="TransactionID">Transaction ID *:</label>
        
        <input type="text" id="TransactionID" name="TransactionID" class="transaction"/>

        <div>
          <a href="ticket.html">
            <input type="submit" name="submit" class="button" />
          </a>
        </div>
      </form>
    </div>
  </body>
</html>