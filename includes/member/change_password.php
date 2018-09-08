<?php
    require_once './secure.inc.php';
    $success=0;
    $errors = array();
    if(isset($_POST['change_password'])){
        $current_password = $_POST['current_password']; 
        $new_password = $_POST['new_password']; 
        $confirm_password = $_POST['confirm_password']; 
        require_once '../db.inc.php';
        $username = $_SESSION['username'];
        $email=$_SESSION['email'];
        $password = md5($current_password);
        $new_password=md5($new_password);
        $confirm_password=  md5($confirm_password);
        $query = "select * from users where username='$username' and password='$password'";
        $result = mysql_query($query);
        if(mysql_num_rows($result)==1){
           
            if($confirm_password!=$new_password){
                $errors['confirm_password']="Password mismatch";
            }
            else{
            $query_change="update users set password='$new_password' where email='$email'";
            require_once '../db.inc.php';
            mysql_query($query_change);
            $success=1;
            
            }
            }else{
            $errors['current_password']="Wrong Current password";
        }
    }
    ?>

<!DOCTYPE html>
<html>
   
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="default.css" rel="stylesheet" type="text/css"/>
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
   <a href="withdrawal_history.php">WITHDRAWAL</a>
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
<div class="square">
        <div class="square">
    
            <form class="login-forms" action="change_password.php" method="POST">
        <h2>
            Change Password
        </h2>
        <table id="history">
            <input readonly type="text" class="login-labels"value="Current Password:">
                <input class="login-fields" type="password" name="current_password" value="">
                <?php if(isset($errors['current_password'])){?> <br/><span class="error" style="margin-left:2rem;"><?php echo $errors['current_password'] ?></span>
                        <?php } ?>

                <br/>
                <input readonly type="text" class="login-labels" value="New Password:">
                <input class="login-fields" type="password" name="new_password" value="">
                <?php if(isset($errors['new_password'])){?> <br/><span class="error"><?php echo $errors['new_password'] ?></span>
                        <?php } ?>
                <br/>
                <input readonly type="text" class="login-labels" value="Confirm Password:">
                <input class="login-fields" type="password" name="confirm_password" value="">
                <?php if(isset($errors['confirm_password'])){?> <br/><span class="error"><?php echo $errors['confirm_password'] ?></span>
                        <?php } ?>
                <br/>
                
                <input type="submit" name="change_password" value="Update" class="btn_special" style="background-color: steelblue;margin-bottom: 5px;" />
                <input type="submit" name="cancel" value="Cancel" class="btn_special" style="background-color: tomato;margin-bottom: 5px;" />
                    <?php
                    if($success==1){
                    ?>       
                <?php
                      echo "<br/>".'Password changed successfully!!';
                ?>
                <?php
                    }
                ?>


            
        </table>
        </form>
        </div>
    </body>
    <div id="footer">
    <?php require_once './footer.php'; ?>
    </div>
</html>
