<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>HOMEPAGE</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles/default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<?php require_once './includes/guest/header.php';?>
</div>
<div id="menu">
	<?php require_once './includes/guest/menu.inc.php'; ?>
</div>
    <style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  width: 100%px;
  position: relative;
  margin: auto;
  overflow-y: hidden;
  overflow-x: hidden;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: 120px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
    <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="images/banner1.jpg" style="width:100%;height:18rem;">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/banner2.jpg" style="width:100%;height:18rem;">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="images/banner3.png" style="width:100%;height:18rem;">
  <div class="text"></div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<style>
    .square{
        height: auto;
        width: 95%;
        display: block;
        text-align: justify;
        border: none;
        
        
        margin-left: 2%;
        margin-top: 3rem;
        
        font-size: 16px;
        color: #000;
        background-color: #fff;
        margin-bottom: 2%;
        border-radius: 10px;
        
        
    }
</style>
<style>
    .square{
        height: auto;
        width: 80%;
        display: inherit;
        text-align: justify;
        padding-top: 5px;
        padding-left: 5px;
        padding-right: 3px;
        padding-bottom: 2px;
        border: 1px solid #000;
        margin-left: 12.5%;
        margin-top: 0.3rem;
        
        font-size: 16px;
        color: #000;
        background-color: #eee;
        margin-bottom: 1%;
        border-radius: 10px;
        
        
    }
</style>
    <div class="square">
        You can start your own business by just opting our helping plan which cost you Rs 99/- only. Boost your business by just starting and referring your 5 friends and tell them to do the same i.e. to opt our helping plan & refer to their friends. So, by just investing Rs 99/- can make you lakhpati or crorepati depending on how many people you and your referral has invited. <a href="howtowork.php" style="font-size: 12px;">READ MORE...</a>
<br/><br/>
    </div>
    <br/>
    
    <style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 79.7%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    //text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}
#customers tr{
    max-height: 2px;
}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
    
}
</style>
<div>
    <?php
echo "<center>"."<form action='#' method='POST'>";
echo "<h2 style='color:#000;font-size:15px;'>"."Recent 10 withdrawals to users "."</h2>";
echo "<table id='customers'>
<tr>
<th>Withdrawal Amount</th>
<th>Withdrawal Date</th>
<th>Payment Proof</th>

</tr>";
$query_his="select * from withdrawal ORDER BY date DESC LIMIT 0,10";
    require_once './includes/db.inc.php';
    $result_his=  mysql_query($query_his);
    $count=1;
    while($row=  mysql_fetch_array($result_his)){
       if($count<=10){
           $proof_name=$row['proof'];
           $email=$row['email'];
           
    echo "<tr>";
    echo "<td>"."Withdrawal of "."<b>"."Rs ".$row['amount'] ."/-"."</b>" ." has been processed to ".$row['email']. "</td>";
    echo "<td>".$row['date'] . "</td>";
    echo "<td>"."<a href='includes/admin/payment_proofs/$proof_name' download>"."Payment Proof"."</a>"."</td>";
    echo "</tr>";
    $count++;
       }
    }
    
echo "</table>"."</form>"."</center>";
?>
<br/>
</div>

    <div id="content2">
        <br/><br/>
<h3 style="color: #2980f3;
    font-family: sans-serif;
    font-size: 24.5px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 3px;
    text-align: center">why users choose us?</h3>
    <h2 style="color: #5a5a5a;
    font-family: sans-serif;
    font-size: 18px;
    
    font-weight: 400;
    margin-top: 11px;
    
    text-align: center">Be lakhpati or crore pati by just opting our helping plan & refer your friends!!</h2>
        <ul>
            <li style="margin-left: 3rem;"><a href="privacy.php" style="font-size: 14px;">Privacy policy</a></li>
            <li style="margin-left: 3rem;"><a href="opportunities.php" style="font-size: 14px;">Business opportunities</a></li>

            <li style="margin-left: 3rem;"><a href="terms_conditions.php" style="font-size: 14px;">Terms & conditions</a></li>
            <li style="margin-left: 3rem;"><a href="register.php" style="font-size: 14px;">Register</a></li>

            <li style="margin-left: 3rem;"><a href="contact.php" style="font-size: 14px;">Contact Us</a></li>

            <li style="margin-left: 3rem;"><a href="howtowork.php" style="font-size: 14px;">How to work?</a></li>

            <li style="margin-left: 3rem;"><a href="loginuser.php" style="font-size: 14px;">Login</a></li>


        </ul>
    </div>

<div id="footer">
   <?php require_once './includes/guest/footer.php'; ?>
</div>
</body>
</html>
