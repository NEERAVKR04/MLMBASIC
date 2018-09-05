<?php
    require_once './secure.inc.php';
    $status = 0;
    if(isset($_POST['submit'])){
        $current_password = $_POST['current_password']; 
        $new_password = $_POST['new_password']; 
        $confirm_password = $_POST['confirm_password']; 
        require_once '../db.inc.php';
        $username = $_SESSION['username'];
        $email=$_SESSION['email'];
        $password = md5($current_password);
        $new_password=md5($new_password);
        $query = "select * from users where username='$username' and password='$password'";
        $result = mysql_query($query);
        if(mysql_num_rows($result)==1){
           
            if($confirm_password!=$new_password){
                $status=1;
            }
            else{
            $query_change="update users set password='$new_password' where email='$email'";
            require_once '../db.inc.php';
            mysql_query($query_change);
            
            }
            }else{
            $status=3;
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
    </div>
    
</div>
        <div id="content">
        <h2>Change Password Form</h2>
        <form action="change_password.php" method="POST">
            <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td>Current Password:</td>
                        <td><input required type="password" name="current_password" value="" /></td>
                    </tr>
                    <tr>
                        <td>New Password:</td>
                        <td><input required type="password" name="new_password" value="" /></td>
                    </tr>
                    <tr>
                        <td>Confirm Password:</td>
                        <td><input required type="password" name="confirm_password" value="" /></td>
                    </tr>
                    <tr >
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="Change Password" /></td>
                        
                    </tr>
                </tbody>
            </table>
        </form>
        <?php if($status==3) { ?>
            <h2 class="error">The current password is Incorrect</h2>
            <?php } ?>
        </div>
    </body>
    <div id="footer">
    <?php require_once './footer.php'; ?>
    </div>
</html>
