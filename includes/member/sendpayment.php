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
          $email=$row['email'];
       }
   }
?>

<?php
$display=0;
if(isset($_POST['getdetails'])){
    $method=$_POST['method'];
    $purpose=$_POST['purpose'];
    $amount=$_POST['amount'];
    $display=1;
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>
            LOGIN FORM
        </title>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="default.css">
    </head>
    <body>
                <style>
#header-reg {
        width: 100%;
	margin: 0px auto;
	padding: 5px 0px 6px 0px;
	background-color: #4773C1;
        min-height: 50px;
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
	text-align: center;
}

#menu-reg li {
	display: inline;
}

#menu-reg a {
	padding: 5px 15px;
	text-transform: uppercase;
	text-decoration: none;
	font-size: 11px;
	font-weight: bold;
	color: #FFFFFF;
}

#menu-reg a:hover {
	background-color: #6D92D5;
}

        </style>
        
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
    .login-form {
  color: #333;
  background-color: #fff;
  border-radius: 5px;
  
  width: 30rem;
  
  height:10rem;
  text-align: center;
  margin-top: 2rem;
  padding: 2rem;
}

.login_details {
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
  border: 1px solid #ccc;
  border-radius: 10px;
  margin-left: 15rem;
  margin-right: 5rem;
  background: #eee;
  
}

.heading-primary {
  font-size: 2rem;
  font-weight: 300;
}

.input_field {
  width: 15rem;
  padding: .6rem 1rem;
 margin-top: 0.5rem;
  border-radius: 5px;
  border: 1px solid #e4e5e7;
  color: #333;
  font-size: 1rem;
  margin-left: -5rem;
}

.input_label {
  font-size: 1rem;
  margin-right: 1rem;
  width: 15rem;
  margin-left: 18rem;
  font-weight: bold;
}

.btn_action {
  display: flex;
  grid-column: 1/3;
}

.btn_special {
  color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
  margin-left: 1rem;
  margin-right: 1rem;
  margin-top: 1rem;
  
  border: none;
  border-radius: 100px;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: 200ms ease-in;
  width: 6rem;
  outline: none;
}
  .btn_special:hover {
    -webkit-filter: brightness(1.2);
    transform: translateY(-2px);
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
<style>
    .square{
        height: auto;
        width: 70%;
        display: grid;
        border: 1px solid #e4e5e7;
        display: inline-block;
        float: left;
        margin-left: 8%;
        margin-top: 2rem;
        text-align: center;
        font-size: 20px;
        color: #4773C1;
        background-color: #eee;
        margin-bottom: 2%;
        border-radius: 10px;
        
        
    }
    .square2{
        height: auto;
        width: 45%;
        display: grid;
        border: 1px solid #e4e5e7;
        display: inline-block;
        float: left;
        margin-left: 2%;
        margin-top: 2rem;
        text-align: center;
        font-size: 20px;
        color: #4773C1;
        background-color: #fff;
        margin-bottom: 2%;
        border-radius: 10px;
        
        
    }
</style>
<style>
    .login-forms{
        min-height: 300px;
        font-weight: bold;
        font-size: 18px;
        margin-top: 2rem;
        text-align: center;
        color: black;
        
        
    }
    .login-fields{
        margin-left: 0rem;
        border-radius: 5px;
        padding: .6rem 1rem;
        border: 1px solid #e4e5e7;
        margin-top: 0.5rem;
        font-size: 1rem;
        color: #333;
        width: 15rem;
        margin-bottom: 1rem;
       
    }
    .login-labels{
        margin-top: 1rem;
        width: 12rem;
        border:none;
        background: none;
        text-align: left;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 1rem;
    }
</style>

<div class="square">
    
    <form class="login-forms" action="sendpayment.php" method="POST" enctype="multipart/form-data">
        <h2>
            Our Payment Details
        </h2>
        
        <table id="history">
            <div class="square2">
            <h3 style="color: black;">Bank Info:</h3>
            <input readonly type="text" class="login-labels" value="Account No.: " style="text-align: right;"><input readonly type="text" class="login-labels" value="919690531162" style="font-weight: lighter;font-size: 16px;text-align: left;"><br/>
            <input readonly type="text" class="login-labels" value="Bank Name: " style="text-align: right;" ><input readonly type="text" class="login-labels" value="PayTM Payments Bank"  style="font-weight: lighter;font-size: 16px;text-align: left;"><br/>
            <input readonly type="text" class="login-labels" value="Account Name: " style="text-align: right;"><input readonly type="text" class="login-labels" value="Neerav Kumar"  style="font-weight: lighter;font-size: 16px;text-align: left;"><br/>
            <input readonly type="text" class="login-labels" value="Account Type: " style="text-align: right;"><input readonly type="text" class="login-labels" value="Savings"  style="font-weight: lighter;font-size: 16px;text-align: left;"><br/>
            <input readonly type="text" class="login-labels" value="IFSC Code: " style="text-align: right;"><input readonly type="text" class="login-labels" value="PYTM0123456" style="font-weight: lighter;font-size: 16px;text-align: left;"><br/>
            <label style="font-size:14px;color: black;">Note: </label><label style="color:red;font-size:12px;">Pay only to these payment details. No responsibility shall be beared if payment sent to wrong informations!!</label><br/>

            </div>
            <div class="square2">
            <h3 style="color: black;">UPI, PayTM, Paypal Info:</h3>
            <input readonly type="text" class="login-labels" value="UPI Address: " style="text-align: right;"><input readonly type="text" class="login-labels" value="919690531162" style="font-weight: lighter;font-size: 16px;text-align: left;"><br/>
            <input readonly type="text" class="login-labels" value="PayTM No.: " style="text-align: right;" ><input readonly type="text" class="login-labels" value="PayTM Payments Bank"  style="font-weight: lighter;font-size: 16px;text-align: left;"><br/>
            <input readonly type="text" class="login-labels" value="Paypal Id: " style="text-align: right;"><input readonly type="text" class="login-labels" value="Neerav Kumar"  style="font-weight: lighter;font-size: 16px;text-align: left;"><br/>
            <label style="font-size:14px;color: black;">Note: </label><label style="color:red;font-size:12px;">Pay only to these payment details. No responsibility shall be beared if payment sent to wrong informations!!</label><br/>
            </div>
            
        </table>
        </form>
</div>


<!--        <div id="content" class="login-form">
            <h3 class="heading-primary">
                How you want to pay us?
            </h3>
            <form action="sendpayment.php" method="POST">
                <div class="login_details">
                    <div class="input_label">Method:</div>
                    <select class="input_field" name="method">
                        <option id="1">PayPal</option>
                        <option id="2">PayTM</option>
                        <option id="3" selected>UPI</option>
                        <option id="4">Bank Transfer</option>
                    </select>
                    <div class="input_label">Purpose:</div>
                    <select class="input_field" name="purpose" onselect="getdetails()">
                        <option id="5" selected>Activate Id</option>
                        <option id="6">Upgrade Plan</option>
                        <option id="7">Advertisement Campaign</option>
                        
                    </select>
                    <div class="input_label">Amount:</div>
                    <select class="input_field" name="amount" onselect="getdetails()">
                        <option id="8">5$</option>
                        <option id="9">11$</option>
                        <option id="10">21$</option>
                        <option id="11">50$</option>
                        <option id="12">99$</option>
                        
                    </select>

                    
                    <div class="btn_action">
                        <input type="submit" name="getdetails" value="Get Details" class="btn_special" style="background-color: steelblue;" />
                        <a class="btn_special" href="register.php" style="background-color: springgreen;">Signup</a>
                        <a class="btn_special" href="index.php" style="background-color: #eb2f64;">Home</a>   
                    </div>

                </div>
                </form>
            <?php if($method=='UPI' && $purpose=='Activate Id')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at 9690531162@paytm UPI Address!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='PayTM' && $purpose=='Activate Id')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at 9690531162 PayTM Number!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='PayPal' && $purpose=='Activate Id')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at A/C No. 12345678921542 Bank Account!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='Bank Transfer' && $purpose=='Activate Id')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at A/C No. 12345678921542 Bank Account!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            
            <?php if($method=='UPI' && $purpose=='Upgrade Plan')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at 9690531162@paytm UPI Address!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='PayTM' && $purpose=='Upgrade Plan')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at 9690531162 PayTM Number!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='PayPal' && $purpose=='Upgrade Plan')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at A/C No. 12345678921542 Bank Account!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='Bank Transfer' && $purpose=='Upgrade Plan')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at A/C No. 12345678921542 Bank Account!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>

            <?php if($method=='UPI' && $purpose=='Advertisement Campaign')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at 9690531162@paytm UPI Address!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='PayTM' && $purpose=='Advertisement Campaign')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at 9690531162 PayTM Number!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='PayPal' && $purpose=='Advertisement Campaign')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at A/C No. 12345678921542 Bank Account!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
            <?php if($method=='Bank Transfer' && $purpose=='Advertisement Campaign')
                    {?>
      <h2>Deposit <?php echo "$amount"; ?> at A/C No. 12345678921542 Bank Account!!</h2>
      <h3>You need to upload payment proof/receipt after you pay!!<a href="paymentproofs.php"><b style="color: red">&nbsp;Upload</b></a></h3>
            <?php } ?>
      

            
        </div>-->
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