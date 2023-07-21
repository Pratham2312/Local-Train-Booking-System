
<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}
include ('config.php');

// Retrieve the latest data from the first table
$sql1 = "SELECT * FROM source ORDER BY id DESC LIMIT 1";
$result1 = $conn->query($sql1);

/*if ($result1->num_rows > 0) {
  //echo "<h2>Latest Data from Table 1</h2>";
  // Display the data
  while ($row = $result1->fetch_assoc()) {
	echo "Source: " . $row["Source"] . "<br>";
	echo "Destination: " . $row["Destination"] . "<br>";
	// Add more columns as needed
  }
} else {
  echo "No data found in Table 1";
}*/

// Retrieve the latest data from the second table
$sql2 = "SELECT * FROM ticket ORDER BY id DESC LIMIT 1";
$result2 = $conn->query($sql2);

/*if ($result2->num_rows > 0) {
  //echo "<h2>Latest Data from Table 2</h2>";
  // Display the data
  while ($row = $result2->fetch_assoc()) {
	echo "Transaction Id : " . $row["TransactionID"] . "<br>";
	echo "Date and Time  " . $row["date_time"] . "<br>";
	// Add more columns as needed
  }
} else {
  echo "No data found in Table 2";
}*/

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Railway Ticket</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<link rel="stylesheet" href="css/ticketstyle.css">
<style>
	body {
    margin: 0px;
    /* background-color:#F6F6F6; */
	background-image: url("css/images/ticket.jpg");
    background-repeat: no-repeat;
    background-size: cover; 
    
    text-align: center;
    margin: auto;

}
.ticket {
	background-color: #ffb367;
	border: 5px solid #ccc;
	padding: 00px;
	width: 600px;
	height: 450px;
	margin: 0 auto;
	font-family: Arial, sans-serif;
}

.nav-img {
    height: 75px;
    width: 75px;
    position: absolute;
    left: 40px;
    top: 7px;
}

.Apli {
    font-size: 2rem;
}


.navbar {
  background-color:rgba(0,0,0,0);
  
  padding-left: 70px;
  font-weight: bold;
  font-size: 1.7rem;
  padding-top: 3px;
  padding-bottom: 3px;
  color: white;

}
.navbar ul {
    overflow: auto;
}

.navbar li {
    float: left;
    list-style: none;
    margin: 1px 20px;
    margin-top: 0px;
    margin-bottom: 0px;

}

.nav-link {
    position: absolute;
    right: 100px;
}

.navbar li a {
    padding: 3px 3px;
    text-decoration: none;
    color: rgb(255, 255, 255);
}

.navbar li a:hover {
    color: rgb(255, 146, 4)
}

.login {
    position: absolute;
    right: 10px;
}
.button{
  margin:10px;
  margin-top:30px;
  font-size:1.5rem; 
  color:yellow;
}
.btn {
        background-color: #1c87c9;
        border: none;
        color: white;
        padding: 20px 34px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
      }
</style>
<body>
<header>
        <nav class="navbar">
            <ul>
              <li class="Apli" ><img src="css/images/logo.png" class="nav-img" alt="" href="home.php"></li>
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
	<div class="rohit"><h3>
	<h2><?php echo "Thank You ". $_SESSION['username']?>!!! Here is your ticket</h2>
	</h3></div>
	<div class="ticket">
		<div class="header">
		
			<h1 >Aapli Local Ticket</h1>
			
		
		<div class="details">
		<h3><?php if ($result2->num_rows > 0) {
  //echo "<h2>Latest Data from Table 2</h2>";
  // Display the data
  while ($row = $result2->fetch_assoc()) {
  echo "Booked By: ". $_SESSION['username']. "<br>";
	echo "Transaction Id : " . $row["TransactionID"] . "<br>";
	echo "Date and Time  " . $row["date_time"] . "<br>";
	// Add more columns as needed
  }
} else {
  echo "No data found in Table 2";
}
if ($result1->num_rows > 0) {
	//echo "<h2>Latest Data from Table 1</h2>";
	// Display the data
	while ($row = $result1->fetch_assoc()) {
    
	  echo "Source: " . $row["Source"] . "<br>";
	  echo "Destination: " . $row["Destination"] . "<br>";
	  
	  // Add more columns as needed
	}
  } else {
	echo "No data found in Table 1";
  }?>
		<h3>Ticket Fare Price: Rs25/-</h3>
		</div>
		<div class="barcode">
			<img src="css/images/barcode1.png" alt="barcode">
			<h3>Happy Journey 😊</h3>
		</div>
		<div class="footer">
			<p><strong>Note:</strong> Please carry a valid photo ID card for verification. <br>
        Journey should be commenced within 1hr within the Booking time.
    </p>
		</div>
	</div>
  <div class="button">
    <p>Have to book another ticket <a href="home.php" class="btn">Book</a></p>
  </div>
</body>
</html>
