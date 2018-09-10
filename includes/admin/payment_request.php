<?php
require_once './secure.inc.php';
include '../db.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$query_check_code="select * from users where username='$username'";
require_once '../db.inc.php';
$referral_code_check=  mysqli_query($con,$query_check_code);

       while ($row = mysqli_fetch_assoc($referral_code_check)) {
          $referral_code= $row["referral_code"];
          $credit=$row["credit"];
          $withdrawal=$row["total_withdrawal"];
          $referral_no=$row["referral_count"];
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
    width: 16%;
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

    <!--<b style="color: #000;margin-left: 25px">Your Referral Code is:&nbsp;</b><b style="color: tomato"><?php echo "<b>".$referral_code."</b>";?></b>
-->
    </div>
<div class="vertical-content">
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
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
</style>
<?php
if(isset($_POST['hide'])){
    $useremail=$_POST['useremail'];
    $query="update paymentwithdraw set request='HIDE' where email='$useremail'";
require_once '../db.inc.php';
mysqli_query($con,$query);
}
?>
<?php 
echo "<form action='payment_request.php' method='POST'  style='background:#eee;'>";
echo "<tr>"."<th>"."<input type='submit' name='pending' value='Show Pending' style='color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
  
  margin-top: 0.3rem;
  margin-bottom:5px;
  margin-left: 30%;
  margin-right: 5px;
  
  background:blue;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 12rem;
  outline: none;'>"."<input type='submit' name='unhide' value='Show Hidden' style='color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
  
  margin-top: 0.3rem;
  margin-bottom:5px;
  margin-left: auto;
  margin-right: 5px;
  
  background:blue;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 12rem;
  outline: none;'>"."<input type='submit' name='approved' value='Show Approved' style='color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
  margin-left: auto;
  
  margin-top: 0.3rem;
  margin-bottom:5px;
  background:tomato;
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 12rem;
  outline: none;'>"."</th>"."</tr>";
echo "</form>";

?>

<?php

if(isset($_POST['pending'])){
echo "<form method='POST' action='payment_request.php'>";
echo "<table id='customers'>
<tr>
<th>Email</th>
<th>Name</th>
<th>Balance</th>
<th>Method</th>
<th>Bank</th>
<th>Type</th>
<th>Account No.</th>
<th>IFSC</th>
<th>UPI</th>
<th>Paytm</th>
<th>Paypal</th>
<th>HIDE</th>
</tr>";
    $query_users="select * from paymentwithdraw where request='pending'";
    require_once '../db.inc.php';
    $result_users=  mysqli_query($con,$query_users);
    while($row=  mysqli_fetch_array($result_users))
{        session_start();
        $useremail=$row['email'];
        
        $query="select * from users where email='$useremail'";
        require_once '../db.inc.php';
        $result=  mysqli_query($con,$query);
        while ($rowuser = mysqli_fetch_array($result)) {
            $credituser=$rowuser['credit'];
        }
echo "<tr>";
echo "<td>" . "<input readonly style='border:none;background:#eee;width:15rem;' type='text' name='useremail' value='$useremail'>". "</td>";
echo "<td>" . $row['first_name'] ." ".$row['last_name']. "</td>";
echo "<td>" . $credituser . "</td>";
echo "<td>" . $row['method'] . "</td>";
echo "<td>" . $row['bank_name'] . "</td>";
echo "<td>" . $row['bank_type'] . "</td>";
echo "<td>" . $row['account_no'] . "</td>";
echo "<td>" . $row['ifsc'] . "</td>";
echo "<td>" . $row['upi'] . "</td>";
echo "<td>" . $row['paytm'] . "</td>";
echo "<td>" . $row['paypal'] . "</td>";
echo "<td>"."<input type='submit' name='hide' value='Hide'>"."</td>";

echo "</tr>";
}
}
echo "</table>";
echo "</form>";
?>
<?php
if(isset($_POST['unhide'])){
    echo "<form method='POST' action='payment_request.php'>";
echo "<table id='customers'>
<tr>
<th>Email</th>
<th>Name</th>
<th>Balance</th>
<th>Method</th>
<th>Bank</th>
<th>Type</th>
<th>Account No.</th>
<th>IFSC</th>
<th>UPI</th>
<th>Paytm</th>
<th>Paypal</th>
<th>Status</th>
</tr>";
    $query_users="select * from paymentwithdraw where request='HIDE'";
    require_once '../db.inc.php';
    $result_users=  mysqli_query($con,$query_users);
    while($row=  mysqli_fetch_array($result_users))
{        session_start();
        $useremail=$row['email'];
        
        $query="select * from users where email='$useremail'";
        require_once '../db.inc.php';
        $result=  mysqli_query($con,$query);
        while ($rowuser = mysqli_fetch_array($result)) {
            $credituser=$rowuser['credit'];
        }
echo "<tr>";
echo "<td>" . "<input readonly style='border:none;background:#eee;width:15rem;' type='text' name='useremail' value='$useremail'>". "</td>";
echo "<td>" . $row['first_name'] ." ".$row['last_name']. "</td>";
echo "<td>" . $credituser . "</td>";
echo "<td>" . $row['method'] . "</td>";
echo "<td>" . $row['bank_name'] . "</td>";
echo "<td>" . $row['bank_type'] . "</td>";
echo "<td>" . $row['account_no'] . "</td>";
echo "<td>" . $row['ifsc'] . "</td>";
echo "<td>" . $row['upi'] . "</td>";
echo "<td>" . $row['paytm'] . "</td>";
echo "<td>" . $row['paypal'] . "</td>";
echo "<td>"."Hidden"."</td>";

echo "</tr>";
}
echo "</table>";
echo "</form>";

}
?>
<?php
if(isset($_POST['approved'])){
    echo "<form method='POST' action='payment_request.php'>";
echo "<table id='customers'>
<tr>
<th>Email</th>
<th>Name</th>
<th>Balance</th>
<th>Method</th>
<th>Bank</th>
<th>Type</th>
<th>Account No.</th>
<th>IFSC</th>
<th>UPI</th>
<th>Paytm</th>
<th>Paypal</th>
<th>HIDE</th>
</tr>";
    $query_users="select * from paymentwithdraw where request='approved'";
    require_once '../db.inc.php';
    $result_users=  mysqli_query($con,$query_users);
    while($row=  mysqli_fetch_array($result_users))
{        session_start();
        $useremail=$row['email'];
        
        $query="select * from users where email='$useremail'";
        require_once '../db.inc.php';
        $result=  mysqli_query($con,$query);
        while ($rowuser = mysqli_fetch_array($result)) {
            $credituser=$rowuser['credit'];
        }
echo "<tr>";
echo "<td>" . "<input readonly style='border:none;background:#eee;width:15rem;' type='text' name='useremail' value='$useremail'>". "</td>";
echo "<td>" . $row['first_name'] ." ".$row['last_name']. "</td>";
echo "<td>" . $credituser . "</td>";
echo "<td>" . $row['method'] . "</td>";
echo "<td>" . $row['bank_name'] . "</td>";
echo "<td>" . $row['bank_type'] . "</td>";
echo "<td>" . $row['account_no'] . "</td>";
echo "<td>" . $row['ifsc'] . "</td>";
echo "<td>" . $row['upi'] . "</td>";
echo "<td>" . $row['paytm'] . "</td>";
echo "<td>" . $row['paypal'] . "</td>";
echo "<td>"."<input type='submit' name='hide' value='Hide'>"."</td>";

echo "</tr>";
}
echo "</table>";
echo "</form>";

}
?>
</div>  
    

</body>
</html>
