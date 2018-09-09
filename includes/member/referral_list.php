<?php
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
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
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>MuslimIn</title>
 
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
            MLMLOGO
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
echo "<table id='customers'>
<tr>
<th>Referral List</th>
</tr>";
echo "</table>";
echo "<form action='referral_list.php' method='POST'>";
echo "<table id='customers'>
<tr>
<th style='background-color: #4773C1;'>Name</th>
<th style='background-color: #4773C1;'>Email</th>
<th style='background-color: #4773C1;'>Mobile</th>
<th style='background-color: #4773C1;'>Package</th>
<th style='background-color: #4773C1;'>Referral Code</th>
<th style='background-color: #4773C1;'>Referral Count</th>
<th style='background-color: #4773C1;'>Referred By</th>


</tr>";
$query_users="select * from users where username='$username' ";
    require_once '../db.inc.php';
    $result_users=  mysql_query($query_users);
    while($row=  mysql_fetch_array($result_users)){
        $referral_code=$row['referral_code'];
    }
    $query_referrals="select * from users where refer_code='$referral_code'";
    require_once '../db.inc.php';
    $result_referrals=  mysql_query($query_referrals);
    if($referral_code!=''){
    while ($row1 = mysql_fetch_array($result_referrals)) {
        $members_referral_code=$row1['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row1['first_name'] ." ".$row1['last_name']. "</td>";
    echo "<td>".$row1['email'] . "</td>";
    echo "<td>".$row1['mobile'] . "</td>";
    echo "<td>".$row1['referral_code']."</td>";
    echo "<td>".$row1['referral_count']."</td>";
    echo "<td>"."ME"."</td>";
    echo "</tr>";
    }
    }
    

$query_2level="select * from users where refer_code='$members_referral_code'";
require_once '../db.inc.php';
$result_2level=  mysql_query($query_2level);
if($members_referral_code!=''){
while ($row2 = mysql_fetch_array($result_2level)) {
        $members_referral_code2=$row2['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row2['first_name'] ." ".$row2['last_name']. "</td>";
    echo "<td>".$row2['email'] . "</td>";
    echo "<td>".$row2['mobile'] . "</td>";
    echo "<td>".$row2['referral_code']."</td>";
    echo "<td>".$row2['referral_count']."</td>";
    echo "<td>".$row2['referee_name']." -2nd Level"."</td>";
    echo "</tr>";
}
}

if($members_referral_code2!=''){
$query_3level="select * from users where refer_code='$members_referral_code2'";
require_once '../db.inc.php';
$result_3level=  mysql_query($query_3level);
while ($row3 = mysql_fetch_array($result_3level)) {
        $members_referral_code3=$row3['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row3['first_name'] ." ".$row3['last_name']. "</td>";
    echo "<td>".$row3['email'] . "</td>";
    echo "<td>".$row3['mobile'] . "</td>";
    echo "<td>".$row3['referral_code']."</td>";
    echo "<td>".$row3['referral_count']."</td>";
    echo "<td>".$row3['referee_name']." -3rd Level"."</td>";
    echo "</tr>";
}
}

if($members_referral_code3!=''){
$query_4level="select * from users where refer_code='$members_referral_code3'";
require_once '../db.inc.php';
$result_4level=  mysql_query($query_4level);
while ($row4 = mysql_fetch_array($result_4level)) {
        $members_referral_code4=$row4['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row4['first_name'] ." ".$row4['last_name']. "</td>";
    echo "<td>".$row4['email'] . "</td>";
    echo "<td>".$row4['mobile'] . "</td>";
    echo "<td>".$row4['referral_code']."</td>";
    echo "<td>".$row4['referral_count']."</td>";
    echo "<td>".$row4['referee_name']." -4th Level"."</td>";
    echo "</tr>";
}
}

if($members_referral_code4!=''){
$query_5level="select * from users where refer_code='$members_referral_code4'";
require_once '../db.inc.php';
$result_5level=  mysql_query($query_5level);
while ($row5 = mysql_fetch_array($result_5level)) {
        $members_referral_code5=$row5['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row5['first_name'] ." ".$row5['last_name']. "</td>";
    echo "<td>".$row5['email'] . "</td>";
    echo "<td>".$row5['mobile'] . "</td>";
    echo "<td>".$row5['referral_code']."</td>";
    echo "<td>".$row5['referral_count']."</td>";
    echo "<td>".$row5['referee_name']." -5th Level"."</td>";
    echo "</tr>";
}
}

if($members_referral_code5!=''){
$query_6level="select * from users where refer_code='$members_referral_code5'";
require_once '../db.inc.php';
$result_6level=  mysql_query($query_6level);
while ($row6 = mysql_fetch_array($result_6level)) {
        $members_referral_code6=$row6['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row6['first_name'] ." ".$row6['last_name']. "</td>";
    echo "<td>".$row6['email'] . "</td>";
    echo "<td>".$row6['mobile'] . "</td>";
    echo "<td>".$row6['referral_code']."</td>";
    echo "<td>".$row6['referral_count']."</td>";
    echo "<td>".$row6['referee_name']." -6th Level"."</td>";
    echo "</tr>";
}
}

if($members_referral_code6!=''){
$query_7level="select * from users where refer_code='$members_referral_code6'";
require_once '../db.inc.php';
$result_7level=  mysql_query($query_7level);
while ($row7 = mysql_fetch_array($result_7level)) {
        $members_referral_code7=$row7['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row7['first_name'] ." ".$row7['last_name']. "</td>";
    echo "<td>".$row7['email'] . "</td>";
    echo "<td>".$row7['mobile'] . "</td>";
    echo "<td>".$row7['referral_code']."</td>";
    echo "<td>".$row7['referral_count']."</td>";
    echo "<td>".$row7['referee_name']." -7th Level"."</td>";
    echo "</tr>";
}
}

if($members_referral_code7!=''){
$query_8level="select * from users where refer_code='$members_referral_code7'";
require_once '../db.inc.php';
$result_8level=  mysql_query($query_8level);
while ($row8 = mysql_fetch_array($result_8level)) {
        $members_referral_code8=$row8['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row8['first_name'] ." ".$row8['last_name']. "</td>";
    echo "<td>".$row8['email'] . "</td>";
    echo "<td>".$row8['mobile'] . "</td>";
    echo "<td>".$row8['referral_code']."</td>";
    echo "<td>".$row8['referral_count']."</td>";
    echo "<td>".$row8['referee_name']." -8th Level"."</td>";
    echo "</tr>";
}
}

if($members_referral_code8!=''){
$query_9level="select * from users where refer_code='$members_referral_code8'";
require_once '../db.inc.php';
$result_9level=  mysql_query($query_9level);
while ($row9 = mysql_fetch_array($result_9level)) {
        $members_referral_code9=$row9['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row9['first_name'] ." ".$row9['last_name']. "</td>";
    echo "<td>".$row9['email'] . "</td>";
    echo "<td>".$row9['mobile'] . "</td>";
    echo "<td>".$row9['referral_code']."</td>";
    echo "<td>".$row9['referral_count']."</td>";
    echo "<td>".$row9['referee_name']." -9th Level"."</td>";
    echo "</tr>";
}
}

if($members_referral_code9!=''){
$query_10level="select * from users where refer_code='$members_referral_code9'";
require_once '../db.inc.php';
$result_10level=  mysql_query($query_10level);
while ($row10 = mysql_fetch_array($result_10level)) {
        $members_referral_code10=$row10['referral_code'];
        
    echo "<tr>";
    echo "<td>".$row10['first_name'] ." ".$row10['last_name']. "</td>";
    echo "<td>".$row10['email'] . "</td>";
    echo "<td>".$row10['mobile'] . "</td>";
    echo "<td>".$row10['referral_code']."</td>";
    echo "<td>".$row10['referral_count']."</td>";
    echo "<td>".$row10['referee_name']." -10th Level"."</td>";
    echo "</tr>";
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
    text-align: center">earn extra money</h3>
    <h2 style="color: #5a5a5a;
    font-family: sans-serif;
    font-size: 50px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 3px;
    
    text-align: center">why <b>join us?</b></h2>
    </div>

</body>
</html>
