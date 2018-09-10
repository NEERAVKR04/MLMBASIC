<?php
require_once './secure.inc.php';
include '../db.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$email=$_SESSION['email'];
$query_check_code="select * from users where username='$username'";
require_once '../db.inc.php';
$referral_code_check=  mysqli_query($con,$query_check_code);
if(mysqli_query($con,$result_rfr)>=0)
   {
     
       while ($row = mysqli_fetch_assoc($referral_code_check)) {
          $referral_code= $row["referral_code"];
          $credit=$row["credit"];
          $withdrawal=$row["total_withdrawal"];
          $referral_no=$row["referral_count"];
          $activation_status=$row["activation"];
          $package=$row["package"];
       }
       if($activation_status!='Y'){
           header('Location: payment.php');
       }
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>MAKEASYLIFE</title>
 
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
        <style>
#header-reg {
        width: 100%;
	margin: 0;
	padding: 5px 0px 6px 0px;
	background-color: #fff;
        height: 62px;
        padding: 0;
        position: relative;
        border-bottom: 1px solid #e4e5e7;
        display: block;
}

#header-reg h1 {
	margin: 0px;
	padding: 0px;
	text-align: center;
}

#header-reg h2 {
	margin: 0px;
	padding: 0px;
	text-align: center;
	font-size: 14px;
}
#header-reg ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
	text-align: center;
        color: #FFFFFF;
        font-family: sans-serif;
        font-size: 18px;
}

#header-reg li {
	display: inline;
}

#header-reg a {
	padding: 5px 15px;
	text-transform: uppercase;
	text-decoration: none;
	font-size: 16px;
	font-weight: bold;
	color: #FFFFFF;
}


/** MENU */

#menu-reg {
	width: 100%;
	margin: 0px auto;
	padding: 5px 0px 6px 0px;
	background-color: #4773C1;
}

#menu-reg ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
	text-align: left;
}

#menu-reg li {
	display: inline;
        
}

#menu-reg a {
	padding: 5px 15px;
	text-transform: uppercase;
	text-decoration: none;
	font-size: 12px;
	font-weight: bold;
	color: #FFFFFF;
}

#menu-reg a:hover {
	background-color: #6D92D5;
}

        </style>
        
<style>

.vertical-menu {
    width: 16%;
    float: left;
    min-height: 580px;
    margin-left: 0px;
    background-color: #eee;
    border: 1px solid;
    margin-top: 62px;
    margin-bottom: 0%;
    
    
}

.vertical-menu a {
    background-color: #eee;
    color: #000;
    display: block;
    padding: 16.5px;
    text-decoration: none;
    
}

.vertical-menu a:hover {
    background-color: #ccc;
}

.vertical-menu a.active {
    background-color: #4CAF50;
    //background-color: #4773C1;
    color: white;
    height:0.7rem;
    
    .vertical-menu a.active-red {
    background-color: tomato;
    //background-color: #4773C1;
    color: white;
    
    .vertical-content {
        float: left;
        padding: 0px 12px;
        border: 1px solid;
        width: 80%;
        border-left: none;
        height: 550px;
        background-color: #eee;
       
    }
    
}
</style>
<div class="vertical-menu">
    <a href="index.php" class="active">HOME</a>
  <a href="profile.php">PROFILE</a>
  <a href="referral_list.php">REFERRALS</a>
  <a href="wallet.php">WALLET</a>
<a href="withdrawal_history.php">TRANSACTIONS</a>
   <a href="requestPayment.php">WITHDRAW</a>
   <a href="bankdetails.php">BANK DETAILS</a>
  <a href="sendpayment.php">PAYMENT OPTIONS</a>
  <a href="payment.php">PAYMENT PROOFS</a>
  <a href="logout.php" class="active-red">LOGOUT</a>
  
    <!--<b style="color: #000;margin-left: 25px">Your Referral Code is:&nbsp;</b><b style="color: tomato"><?php echo "<b>".$referral_code."</b>";?></b>
-->
    </div>

<div id="header-reg">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <a href="index.php"> <span style="float: left;margin-top:1.35rem;margin-left: -175px;font-weight: bolder;color:black;">
            DASHBOARD
        </span>
        <span style="
        height: 62px;
        width: 0;
        border: 0.5px solid;
        //display: inline-block;
        float: left;
        margin-left:0rem;
        margin-top: 0;
        text-align: center;
        font-size: 20px;
        color: #000;
        ">
            
        </span></a>
        <a href="logout.php"> <span style="float: right;margin-top:1.35rem;margin-right: 1.35rem;font-weight: bolder;color:black;">
            LOGOUT
            </span></a>
        <a href="logout.php"> <span style="float: right;margin-top:1.35rem;margin-right: 40%;font-weight: bolder;color:black;">
            MAKEASYLIFE
            </span></a>
    </div>
    
</div>

<div class="vertical-content"> 
    <style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 83.7%;
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
<?php
echo "<form action='notification.php' method='POST'>";
echo "<table id='customers'>
<tr>
<th>Notification Panel</th>
</tr>";
echo "<tr>"."<th style='background:#eee'>"."<input type='submit' name='announcements' value='Announcements' class='btn_special' style='color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
  margin-left: 1rem;
  margin-right: 1rem;
  margin-top: 0.3rem;
  background:blue;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 12rem;
  outline: none;'>"."<input type='submit' name='personal' value='Personal Notification' class='btn_special' style='color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
  margin-left: 1rem;
  margin-right: 1rem;
  margin-top: 0.3rem;
  background:tomato;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 12rem;
  outline: none;'>"."</tr>";
    
                if(isset($_POST['personal'])){
                $query_inf="select * from information where email='$email' ORDER BY date DESC LIMIT 0,3";
                require_once '../db.inc.php';
                $result_inf=  mysqli_query($con,$query_inf);
                
                while ($row1 = mysqli_fetch_array($result_inf)) {
                    $message=$row1['message'];
                    
                    echo "<tr>"."<td>"."<label style='color:blue;'>".$message."</label>"."</td>"."</tr>";
                    $count++;
                }
                }
                
                if(isset($_POST['announcements'])){
                $query_inf="select * from notifications ORDER BY date DESC LIMIT 0,3";
                require_once '../db.inc.php';
                $result_inf=  mysqli_query($con,$query_inf);
                
                
                while ($row1 = mysqli_fetch_array($result_inf)) {
                    $message=$row1['message'];
                    
                    echo "<tr>"."<td>"."<label style='color:red;'>".$message."</label>"."</td>"."</tr>";
                    $count++;
                
                }
                }
                
echo "</table>";
?>
</div>

    
  
<div style="width: 100%;
	overflow: hidden;
	margin-left: 0px;
        min-height: 420px;
        background-color: #eee;">
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


</body>
</html>
