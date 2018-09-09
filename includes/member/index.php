<?php
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$email=$_SESSION['email'];

$query_check_code="select * from users where username='$username'";
require_once '../db.inc.php';
$referral_code_check=  mysql_query($query_check_code);
if(mysql_query($result_rfr)>=0)
   {
     
       while ($row = mysql_fetch_assoc($referral_code_check)) {
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
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0"><title>Dashboard</title>
 
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body style="background: #eee">
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
    <a href="../../index.php" class="active">HOME</a>
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
            MLMLOGO
            </span></a>
    </div>
    
</div>
<div class="vertical-content" style="">
    <style>
        .referrals{
        float: left;
        padding: 0px 12px;
        border: 1px solid;
        width: 65%;
        min-height: 60px;
        text-align: justify;
        margin-left: 5rem;
        margin-top: 1rem;
        border-radius: 3px;
        padding: 16px;
        position: relative;
        background-color: #fff;
        
    }
    </style>
    <style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
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
    padding-top: 10px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
</style>
<style>
#history {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#history td, #history th {
    border: 1px solid #ddd;
    padding: 8px;
    font-size: 14px;
    //text-align: center;
}

#history tr:nth-child(even){background-color: #f2f2f2;}

#history tr:hover {background-color: #ddd;}
#history tr{
    max-height: 2px;
}

#history th {
    padding-top: 10px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
</style>
    <style>
        .announcements{
        float: left;
        padding: 0px 12px;
        border: 1px solid;
        width: 65%;
        min-height: 100px;
        text-align: justify;
        margin-left: 5rem;
        margin-top: 1rem;
        border-radius: 3px;
        padding: 16px;
        position: relative;
        background-color: #fff;
        
    }
    </style>
    <div class="referrals">
        <br/>
<?php
$referral_link="localhost/project2/register.php?refer_code=$referral_code&submit=Register";
    echo "<label style='color:black;font-weight:bolder;font-size:18px;font-color:black;'>"."Your Referral Link:"." "."<input type='text' value='$referral_link' style='width:60%;padding:6px 12px;font-size:14px;height:14px;border:1px solid #ccc;border-radius:4px;'>"."</label>"."<br/><br/>"."<label style='color:black;font-weight:bolder;font-size:18px;text-align:center;'>"."Referral code: "."</label>"."<label style='color:blue;font-weight:bolder;font-size:18px;text-align:center;'>".$referral_code;
    
    ?>
    </div>
    <div class="announcements">
        <form action="notification.php" method="POST">
            <table id="customers">
                <th><a href="notification.php" style="color: #fff;">Announcements</a></th>
                <?php
                $query_nof="select * from notifications ORDER BY date DESC LIMIT 0,3";
                require_once '../db.inc.php';
                $result_nof=  mysql_query($query_nof);
                $count_nofno=0;
                if($count_nofno<=3){
                while ($rownof = mysql_fetch_array($result_nof)) {
                    $title=$rownof['title'];
                    $message=$rownof['message'];
                    $message= substr($message,0,70);
                    echo "<tr>"."<td>"."<label style='color:#000;font-size:14px;font-weight:bold;'>".$title."</label>";
                    echo "<br>".$message."  "."<a href='notification.php' style='color:#000;font-size:11px;text-align:right;'>"."read more..."."</a>"."</td>"."</tr>";
                    $count_nofno++;
                }
                }
                ?>

            
        </table>
        </form>
   </div>
    <style>
    .square{
        height: 200px;
        width: 200px;
        border: 3px solid;
        display: inline-block;
        float: left;
        margin-left: 8%;
        margin-top: 2rem;
        text-align: center;
        font-size: 20px;
        color: #4773C1;
        background-color: #fff;
        margin-bottom: 2%;
        
        
    }
</style>


<div class="square">
    <form action="notification.php" method="POST">
            <table id="history">
                <th><a href="notification.php" style="color: #fff;">Informations</a></th>
                <?php
                $query_inf="select * from information where email='$email' ORDER BY date DESC LIMIT 0,3";
                require_once '../db.inc.php';
                $result_inf=  mysql_query($query_inf);
                $count_infno=0;
                if($count_infno<=3){
                while ($row1 = mysql_fetch_array($result_inf)) {
                    $message=$row1['message'];
                    $message= substr($message,0,40);
                    echo "<tr>"."<td>".$message."  "."<a href='notification.php' style='color:#000;font-size:11px;'>"."read more..."."</a>"."</td>"."</tr>";
                    $count_infno++;
                }
                }
                ?>
                
                

                
            
        </table>
        </form>
</div>
<div class="square">
    <form action="index.php" method="POST">
            <table id="history">
                <th><a href="referral_list.php" style="color: #fff;">Referrals</a></th>
                <?php
                $query_ref="select * from users where refer_code='$referral_code' ORDER BY joined_date DESC LIMIT 0,3";
                require_once '../db.inc.php';
                $result_ref=  mysql_query($query_ref);
                $count_refno=0;
                if($count_refno<=3){
                while ($row1 = mysql_fetch_array($result_ref)) {
                    echo "<tr>"."<td>"."Your friend ".$row1['first_name']." joined with your refer code!!"."</td>"."</tr>";
                
                    $count_refno++;
                }
                }
                ?>
                
                

                
            
        </table>
        </form>
</div>
<div class="square">
    <form action="index.php" method="POST">
            <table id="history">
                <th><a href="withdrawal_history.php" style="color: #fff;">Withdrawals</a></th>
                <?php
                $query_his="select * from withdrawal where email='$email' ORDER BY date DESC LIMIT 0,3";
                require_once '../db.inc.php';
                $result_his=  mysql_query($query_his);
                $count_no=0;
                if($count_no<=3){
                while ($row1 = mysql_fetch_array($result_his)) {
                    echo "<tr>"."<td>"."Withdrawal of Rs ".$row1['amount']." has been processed"."</td>"."</tr>";
                
                    $count_no++;
                }
                }
                ?>
                
                

                
            
        </table>
        </form>
</div>
<br/>
    
</div>

 <div style="width: 100%;
	overflow: hidden;
	margin-left: 0px;
        min-height: 420px;
        background-color: #fff;">
        <br/><br/>
<h3 style="color: #2980f3;
    font-family: sans-serif;
    font-size: 24.5px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 3px;
    text-align: center">earn extra money</h3>
    <h2 style="color: #5a5a5a;
    font-family: sans-serif;
    font-size: 50px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 3px;
    
    text-align: center">why <b>join us?</b></h2>
    </div>


   
  
<div id="footer" style="margin-top: 5rem;">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
