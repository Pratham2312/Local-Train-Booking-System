<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}
include ('config.php');



if(isset($_POST['submit'])){
  $Source = $_POST['Source'];
  $Destination = $_POST['Destination'];
  if(!empty($Source)){
    $insert = "insert into `source`  (Source , Destination) values ('$Source' , '$Destination')";
      $result = $conn->query($insert);
      if($result){
        echo "<script>window.open('payment.php','_self') </script>";
      }  
    }
  }

  

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/home.css">*/ -->
    <title>Apli Local</title>
    <style>
    .card {
      border: 5px solid black;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      /* max-width: 400px; */
      width:20%;
      height:300px; 
      margin: 0 50px;
      padding: 20px;
      float: left;
      background-color: rgb(255, 244, 234);
      text-align:justify;
    }
    .card h2 {
      margin-top: 0;
    }

    .card p {
      margin-bottom: 0;
    }

    .card .date {
      font-style: italic;
      color: #999;
    }
    body {
    margin: 0px;
    
    background-image: url("css/images/home.jpg");
    background-size: 100%;
    /* background-position: center; */
    background-repeat: no-repeat;
}
.Apli {
    font-size: 2rem;
   
  }
  .nav-img {
    height: 75px;
    width: 75px;
    position: absolute;
    left: 40px;
    top: 7px;
}

.navbar {
    /* background-color: #FFBD59; */
    /* border-radius: 30px; */
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

.Tickets {

    /* background-image: url("css/images/Mumbai.jpeg"); */

    height: 450px;
    width: 450px;
    margin: 0px auto;
    /* border: 5px solid black; */
    padding-top: 0px;
    background-color: rgba(0, 0, 0, 0.0);
    border-radius: 10px;
    text-align: center;


}

.book {
    /* background-color: rgb(255, 124, 72); */
    margin: 0px;
    color: white;
    padding-top: 30px;
}

h3 {
    font-weight: bold;
    font-size: 3rem;
    margin-top: 0px;
    margin-bottom: 18px;
}

.select {
    /* margin: 20px; */
    font-size: 1.5rem;
    border-radius: 12px;
    padding: 5px;
    background-color: #ffffff;
}

input {
    font-size: 1.5rem;
    border-radius: 12px;
    padding: 5px;
    background-color: #ffffff;
    ;
}

.Heading {
    color: blue;
    text-align: center;
    margin: 10px auto;

    font-weight: bold;
    font-size: 2rem;
}

.inner-Container {
    margin: 20px;
    /* background-color: rgba(0, 0, 0, 0.5); */
    margin-bottom: 10px;
    text-align: center;
    padding: 20px;
    height: 250px;
    padding-top: 30px;
    line-height: 2;
}


input {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

label {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

select {
    margin-bottom: 20px;
    margin-top: 20px;
    line-height: 3;
}





img {
    height: 900px;
    width: 900px;
    position: absolute;
    right: 40px;
    border: 2px solid black;
}


  </style>
</head>
<body>
  <!-- <p class="Heading" >Aapli Local </p> -->
    <header>
        <nav class="navbar">
            <ul>
              <li class="Apli"><img src="css/images/logo.png" class="nav-img" alt=""></li>
              <li styles="color: white;">Apli Local</li>
                <li><a href="#">Home</a></li>
                <!-- <li><a href="myTickets.html">My Tickets</a></li> -->
                <li><a href="contactUs.html">Contact Us</a></li>                
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
                  </li>
               
            </ul>
        </nav>
    </header>
    <div class="head Heading">
        <p  >
          <?php echo "Welcome ". $_SESSION['username']?>! You can now book ticket using website
</p>
    </div>
    <div class="card">
    <h2>   Important Notice</h2>
    <p>Central Railway on Thursday said that it will operate a mega block on Trans-Harbour line for carrying out maintenance work on May 28 ,2023 (Sunday).
    The block will be operated on the following routes:
    Thane-Vashi / Nerul up and down trans-harbour line from 11.10 am to 4.10 pm.
    Down line services for Vashi / Nerul / Panvel leaving Thane from 10.35 am to 4.07 pm and up line services for Thane leaving Vashi / Nerul / Panvel from 10.25 am to 4.09 pm will remain cancelled.
    It said there will be no mega block on main line and harbour line on Sunday.
</p>
    <p class="date">Date: May 26, 2023</p>
  </div>
    <div class="Tickets">
      <div class="book">
        <h3>Book Tickets</h3>
      </div>
      <div class="inner-Container">
        <form action="" method="post">
        <select name="Source" id="Source" class="select">
                <option value="">Source</option>
                <option value="CSMT" id="">CSMT</option>
                <option value="Dockyard Rd" id="">Masjid(MSD)</option>
                <option value="Cotton Green" id="">Sandhurst Road(SNRD)</option>
                <option value="Vadala Rd" id="">Byculla(BY)</option>
                <option value="GTB Nagar" id="">Chinchpokli(CHG)</option>
                <option value="Chunabhatti" id="">Currey Road(CRD)</option>
                <option value="Parel(PR)" id="">Parel(PR)</option>
                <option value="Dadar Central(DR)" id="">Dadar Central(DR)</option>
                <option value="Matunga(MTN)" id="">Matunga(MTN)</option>
                <option value="Sion(SIN)" id="">Sion(SIN)</option>
                <option value="Kurla Junction(CLA)" id="">Kurla Junction(CLA)</option>
                <option value="Vidyavihar(VVH)" id="">Vidyavihar(VVH)</option>
                <option value="Ghatkopar(GC)" id="">Ghatkopar(GC)</option>
                <option value="Vikhroli(VK)" id="">Vikhroli(VK)</option>
                <option value="Kanjur Marg(KJRD)" id="">Kanjur Marg(KJRD)</option>
                <option value="Bhandup(BND)">Bhandup(BND)</option>
                <option value="Nahur(NHU)">Nahur(NHU)</option>
                <option value="Mulund(MLND)">Mulund(MLND)</option>
                <option value="Thane(TNA)">Thane(TNA)</option>
                <option value="Kalva(KLVA)">Kalva(KLVA)</option>
                <option value="Mumbra(MBQ)">Mumbra(MBQ)</option>
                <option value="Diva Junction(DIVA)">Diva Junction(DIVA)</option>
                <option value="Kopar(KOPR)">Kopar(KOPR)</option>
                <option value="Dombivli(DI)">Dombivli(DI)</option>
                <option value="Thakurli(THK)">Thakurli(THK)</option>
                <option value="Kalyan Junction(KYN)">Kalyan Junction(KYN)</option>
                <option value="Shahad(SHAD)">Shahad(SHAD)</option>
                <option value="Ambivli(ABY)">Ambivli(ABY)</option>
                <option value="Titvala(TLA)">Titvala(TLA)</option>
                <option value="Khadavli(KDV)">Khadavli(KDV)</option>
                <option value="Vasind(VSD)">Vasind(VSD)</option>
                <option value="Asangaon(ASO)">Asangaon(ASO)</option>
                <option value="Atgaon(ATG)">Atgaon(ATG)</option>
                <option value="Thansit(THS)">Thansit(THS)</option>
                <option value="Khardi(KE)">Khardi(KE)</option>
                <option value="Oombermali(OMB)">Oombermali(OMB)</option>
                <option value="Kasara(KSRA)">Kasara(KSRA)</option>
````````</select>


           
            <br>
            
        <select name="Destination" id="Destination" class="select">
                <option value="">Destination</option>
                <option value="CSMT" id="">CSMT</option>
                <option value="Dockyard Rd" id="">Masjid(MSD)</option>
                <option value="Cotton Green" id="">Sandhurst Road(SNRD)</option>
                <option value="Vadala Rd" id="">Byculla(BY)</option>
                <option value="GTB Nagar" id="">Chinchpokli(CHG)</option>
                <option value="Chunabhatti" id="">Currey Road(CRD)</option>
                <option value="Parel(PR)" id="">Parel(PR)</option>
                <option value="Dadar Central(DR)" id="">Dadar Central(DR)</option>
                <option value="Matunga(MTN)" id="">Matunga(MTN)</option>
                <option value="Sion(SIN)" id="">Sion(SIN)</option>
                <option value="Kurla Junction(CLA)" id="">Kurla Junction(CLA)</option>
                <option value="Vidyavihar(VVH)" id="">Vidyavihar(VVH)</option>
                <option value="Ghatkopar(GC)" id="">Ghatkopar(GC)</option>
                <option value="Vikhroli(VK)" id="">Vikhroli(VK)</option>
                <option value="Kanjur Marg(KJRD)" id="">Kanjur Marg(KJRD)</option>
                <option value="Bhandup(BND)">Bhandup(BND)</option>
                <option value="Nahur(NHU)">Nahur(NHU)</option>
                <option value="Mulund(MLND)">Mulund(MLND)</option>
                <option value="Thane(TNA)">Thane(TNA)</option>
                <option value="Kalva(KLVA)">Kalva(KLVA)</option>
                <option value="Mumbra(MBQ)">Mumbra(MBQ)</option>
                <option value="Diva Junction(DIVA)">Diva Junction(DIVA)</option>
                <option value="Kopar(KOPR)">Kopar(KOPR)</option>
                <option value="Dombivli(DI)">Dombivli(DI)</option>
                <option value="Thakurli(THK)">Thakurli(THK)</option>
                <option value="Kalyan Junction(KYN)">Kalyan Junction(KYN)</option>
                <option value="Shahad(SHAD)">Shahad(SHAD)</option>
                <option value="Ambivli(ABY)">Ambivli(ABY)</option>
                <option value="Titvala(TLA)">Titvala(TLA)</option>
                <option value="Khadavli(KDV)">Khadavli(KDV)</option>
                <option value="Vasind(VSD)">Vasind(VSD)</option>
                <option value="Asangaon(ASO)">Asangaon(ASO)</option>
                <option value="Atgaon(ATG)">Atgaon(ATG)</option>
                <option value="Thansit(THS)">Thansit(THS)</option>
                <option value="Khardi(KE)">Khardi(KE)</option>
                <option value="Oombermali(OMB)">Oombermali(OMB)</option>
                <option value="Kasara(KSRA)">Kasara(KSRA)</option>
         </select>
         <!-- <select name="type" id="type" class="select">
            <option name="Type">Type</option>
            <option name="General">General</option>
            <option name="First_Class">First Class</option>
         </select>  -->
         <br>
         <br>
         <input class="submit" type="submit" name="submit">
      

         
        </form>
</div>
    
    <!-- <div class="map">
        <img src="css/images/map.png" alt="" class=".mumbaimap">''
    </div> -->
    <script src = "css/home.js"></script>
</body>

</html>

</html>