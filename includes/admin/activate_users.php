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
       }
   }
?>
<?php
$error=array();
$user_email=$_POST['email'];
if(isset($_POST['activate']))
{
  $query_act="select * from users where email='$user_email'";
  require_once '../db.inc.php';
  $res_act=  mysql_query($query_act);
  while($row_act=  mysql_fetch_array($res_act)){
      $activation_status=$row_act['activation'];
      $referee_name=$row_act['referee_name'];
      $refer1_code=$row_act['refer_code'];
      $package=$row1_act['package'];
      $referee1_email=$row_act['email'];
      
      $activate='Y';
  $query_activate="update users set activation='$activate',payment_approval='approved' where email='$user_email'";
  require_once '../db.inc.php';
  mysql_query($query_activate);
  }
  
    if($activation_status!='Y'){
    //1st level
    if($refer1_code!=''){
    
        $query_select_credit="select * from users where referral_code='$refer1_code'";
        require_once '../db.inc.php';
        $result_credit=  mysql_query($query_select_credit);
        while($row_credit_check=  mysql_fetch_array($result_credit))
        {   $referee2_code=$row_credit_check['refer_code'];
            $credit_balance=$row_credit_check['credit'];
            echo "$credit_balance";
            $credit_balance=$credit_balance+20;
            echo "$credit_balance";
            $query_credit_update="update users set credit='$credit_balance' where referral_code='$refer1_code'";
            mysql_query($query_credit_update);
        }
    }
    

//2nd Level
if($referee2_code!='')
{
$query_referee2="select * from users where referral_code='$referee2_code'";
include_once '../db.inc.php';
$result_referee2=  mysql_query($query_referee2);
while ($row2 = mysql_fetch_array($result_referee2)) {
    $referee3_code=$row2['refer_code'];
    $credit2=$row2['credit'];
    
        $credit2=$credit2+15;
        $query_credit_update2="update users set credit='$credit2' where referral_code='$referee2_code'";
            mysql_query($query_credit_update2);
    
    
    
    
}
}
//level 3
if($referee3_code!=''){
$query_referee3="select * from users where referral_code='$referee3_code'";
include_once '../db.inc.php';
$result_referee3=  mysql_query($query_referee3);
while ($row3 = mysql_fetch_array($result_referee3)) {
    $referee4_code=$row3['refer_code'];
    $credit3=$row3['credit'];
    
        $credit3=$credit3+12;
        $query_credit_update3="update users set credit='$credit3' where referral_code='$referee3_code'";
            mysql_query($query_credit_update3);
    
    
    
    
}
}
//level 4
if($referee4_code!=''){
$query_referee4="select * from users where referral_code='$referee4_code'";
include_once '../db.inc.php';
$result_referee4=  mysql_query($query_referee4);
while ($row4 = mysql_fetch_array($result_referee4)) {
    $referee5_code=$row4['refer_code'];
    $credit4=$row4['credit'];
    
        $credit4=$credit4+10;
        $query_credit_update4="update users set credit='$credit4' where referral_code='$referee4_code'";
            mysql_query($query_credit_update4);
    
    
}
}
//level 5
if($referee5_code!=''){
$query_referee5="select * from users where referral_code='$referee5_code'";
include_once '../db.inc.php';
$result_referee5=  mysql_query($query_referee5);
while ($row5 = mysql_fetch_array($result_referee5)) {
    $referee6_code=$row5['refer_code'];
    $credit5=$row5['credit'];
    
        $credit5=$credit5+7;
        $query_credit_update5="update users set credit='$credit5' where referral_code='$referee5_code'";
            mysql_query($query_credit_update5);
    
    
}
}
//level 6
if($referee6_code!=''){
$query_referee6="select * from users where referral_code='$referee6_code'";
include_once '../db.inc.php';
$result_referee6=  mysql_query($query_referee6);
while ($row6 = mysql_fetch_array($result_referee6)) {
    $referee7_code=$row6['refer_code'];
    $credit6=$row6['credit'];
    
        $credit6=$credit6+5;
        $query_credit_update6="update users set credit='$credit6' where referral_code='$referee6_code'";
            mysql_query($query_credit_update6);
    
    
}
}
//level 7
if($referee7_code!=''){
$query_referee7="select * from users where referral_code='$referee7_code'";
include_once '../db.inc.php';
$result_referee7=  mysql_query($query_referee7);
while ($row7 = mysql_fetch_array($result_referee7)) {
    $referee8_code=$row7['refer_code'];
    $credit7=$row7['credit'];
    
        $credit7=$credit7+3;
        $query_credit_update7="update users set credit='$credit7' where referral_code='$referee7_code'";
            mysql_query($query_credit_update7);
    
    
}
}
//level 8
if($referee8_code!=''){
$query_referee8="select * from users where referral_code='$referee8_code'";
include_once '../db.inc.php';
$result_referee8=  mysql_query($query_referee8);
while ($row8 = mysql_fetch_array($result_referee8)) {
    $referee9_code=$row8['refer_code'];
    $credit8=$row8['credit'];
    
        $credit8=$credit8+2;
        $query_credit_update8="update users set credit='$credit8' where referral_code='$referee8_code'";
            mysql_query($query_credit_update8);
    
    
}
}
//level 9
if($referee8_code!=''){
$query_referee9="select * from users where referral_code='$referee9_code'";
include_once '../db.inc.php';
$result_referee9=  mysql_query($query_referee9);
while ($row9 = mysql_fetch_array($result_referee9)) {
    $referee10_code=$row9['refer_code'];
    $credit9=$row9['credit'];
   
        $credit9=$credit9+1;
        $query_credit_update9="update users set credit='$credit9' where referral_code='$referee9_code'";
            mysql_query($query_credit_update9);
    
    
}
}
//level 10
if($referee10_code!=''){
$query_referee10="select * from users where referral_code='$referee10_code'";
include_once '../db.inc.php';
$result_referee10=  mysql_query($query_referee10);
while ($row10 = mysql_fetch_array($result_referee10)) {
    //$referee11_code=$row10['refer_code'];
    $credit10=$row10['credit'];
    
        $credit10=$credit10+0.50;
        $query_credit_update10="update users set credit='$credit10' where referral_code='$referee10_code'";
            mysql_query($query_credit_update10);
    
    
}
}
    }
 else {
       $error['activation']="Id already active. No changes made!!"; 
    }
}
if(isset($_POST['deactivate']))
{
$query_update_deact="update users set activation='N' where email='$user_email'";
require_once '../db.inc.php';
mysql_query($query_update_deact);
header('Location: activate_users.php');
}
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0"><title>MuslimIn</title>
 
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
        <style>
#header-reg {
        width: 100%;
	margin: 0px auto;
	padding: 5px 0px 6px 0px;
	background-color: #4773C1;
        min-height: 40px;
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
        <div id="header-reg">
	<?php require_once './header.php';?>
</div>
<div id="menu-reg">
	<?php require_once './menu.inc.php'; ?>
</div>
<style>

.vertical-menu {
    width: 20%;
    float: left;
    min-height: 770px;
    margin-left: 0px;
    background-color: #eee;
    border: 1px solid;
}

.vertical-menu a {
    background-color: #eee;
    color: #000;
    display: block;
    padding: 12px;
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
        min-height: 550px;
    }
}
</style>
<div class="vertical-menu">
    <a href="../../index.php" class="active">Home</a>
  
  <a href="activate_users.php">Activate Id</a>
  <a href="view_users.php">Users</a>
  <a href="approved.php">Approved Id</a>
  <a href="check_payment.php">Payment Proof Request</a>
  <a href="payment_request.php">Withdrawal Request</a>
  <a href="sendnotification.php">Send Notification</a>
  <a href="sendpayment.php">Payment Updation</a>

  
  
  
  
  <a href="#" class="active-red">LOGOUT</a>
  
    <!--<b style="color: #000;margin-left: 25px">Your Referral Code is:&nbsp;</b><b style="color: tomato"><?php echo "<b>".$referral_code."</b>";?></b>
-->
    </div>
<div class="vertical-content">
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 79.74%;
    height: auto;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    //text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

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
<th>Email</th>
<th>Mobile</th>
<th>Name</th>
<th>Activation</th>
<th>Balance</th>
</tr>";
    $query_users="select * from users";
    require_once '../db.inc.php';
    $result_users=  mysql_query($query_users);
    while($row=  mysql_fetch_array($result_users))
{
        if($row['activation']!=Y && $row['role']!='admin'){
echo "<tr>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['mobile'] . "</td>";
echo "<td>" . $row['first_name'] ." ".$row['last_name']. "</td>";
echo "<td>" . $row['activation'] . "</td>";
echo "<td>" . $row['credit'] . "</td>";
echo "</tr>";
}
}
echo "</table>";
?>
<p></p>
<p></p>
<form action="activate_users.php" method="post">
    <label style="margin-left: 1rem;color: #000">Enter email to <label style="color:#4773C1"><b>Activate </b>/<b> Deactivate</b></label>:</label>
<input type="text" name="email" placeholder="" style="border-radius: 5px;width: 12rem;font-size: 1rem;color: #333;height:1.5rem;">
<p></p>
<div style="display: flex;
  grid-column: 1/3;">

<button type="submit" name="activate" style="font-size: 1.6rem;
  padding:0.25rem 1rem;
  margin-left: 1rem;
  display: flex;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 11rem;
  outline: none;
  background-color:#4CAF50;
  color: #FFFFFF">Activate</button>
<button type="submit" name="deactivate" style="color: #fff;
  font-size: 1.6rem;
  margin-left: 1rem;
  padding:0.25rem 1rem;
  display: flex;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 11rem;
  outline: none;
  background-color:red;">De-Activate</button>
  <?php if(isset($error['activation'])){?><br/> <span class="error"><?php echo $error['activation'] ?></span>
                        <?php } ?>
</div>
</form>
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
