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
          $activation_status=$row["activation"];
          $package=$row["package"];
       }
   
?>

<?php
$display=0;
$errors=array();
if(isset($_POST['update'])){
    $user_email=$_POST['email'];
    
    $amount=$_POST['amount'];
    
    
    if(empty($user_email)){
        $errors['email']="Email required!!";
    }
    if(empty($amount)){
        $errors['amount']="Enter valid amount!!";
    }
    $query_st1="select * from users where email='$user_email'";
    require_once '../db.inc.php';
    $result=  mysqli_query($con,$query_st1);
    if($num_rows=  mysqli_num_rows($result)==1){
    while($row=  mysqli_fetch_array($result)){
        $withdrawal_amount=$row['withdrawal_amount'];
        $credit=$row['credit'];
        
        $withdrawal_amount=$withdrawal_amount+$amount;
        $update_credit=$credit-$amount;
        //update user wallet
        if($amount>=$credit){
            $errors['limit']="User don't have enough balance. Only Rs ".$row['credit']."/- Avaiable";
        }
    if(count($errors)==0)
        {
        
        $query_st2="update users set total_withdrawal='$withdrawal_amount',credit='$update_credit' where email='$user_email'";
        require_once '../db.inc.php';
        $result_1=  mysqli_query($con,$query_st2);
        //update payment
        $query="update paymentwithdraw set request='approved' where email='$user_email'";
        require_once '../db.inc.php';
        $result_1=  mysqli_query($con,$query);
        
        //update withdrawal history 
        date_default_timezone_set('Asia/Kolkata');
        $date=  date('Y-m-d H:i:s');
        //admin payment proofs
        $error=array();
    $file_name=$_FILES["image_proof"]["name"];
    $file_size=$_FILES["image_proof"]["size"];
 
    $file_tmp=$_FILES["image_proof"]["tmp_name"];
    $file_type=$_FILES["image_proof"]["type"];
    $file_ext=  strtolower(end(explode('.',$_FILES["image_proof"]["name"])));
    $extensions=array("jpeg","jpg","png");
    if(in_array($file_ext, $extensions)===false){
        $error[]="extension not allowed, please choose a jpeg, jpg or png file";
    }
    if($file_size>2097152){
        $error[]="File size must be upto 2MB Only";
    }
    if(empty($error)==true){
        move_uploaded_file($file_tmp, "payment_proofs/".$file_name);
        $query_st_his="insert into withdrawal values('$user_email','$amount','$date','$file_name')";
        require_once '../db.inc.php';
        mysqli_query($con,$query_st_his);
        
        $display=1;
        
        
    }else{
        
    }
    }
    else{
       
    }
        
    
        }
        }
        else{
            $errors['account']="Email-id doesn't exist!!";
        }
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>
            Payment Updation
        </title>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">
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
    font-family: Arial;
    font-size: 2rem;
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
  <a href="logout.php" class="active-red">LOGOUT</a>
  
    <!--<b style="color: #000;margin-left: 25px">Your Referral Code is:&nbsp;</b><b style="color: tomato"><?php echo "<b>".$referral_code."</b>";?></b>
-->
    </div>
        <div id="content" class="login-form">
            <h3 class="heading-primary">
                Update Withdrawal !!
            </h3>
            <form action="sendpayment.php" method="POST" enctype="multipart/form-data">
                <div class="login_details">
                    <div class="input_label">User E-mail:</div>
                    <input type="text" name="email" class="input_field input_field--registration" value="<?php echo "$email"?>" />
                        <?php if(isset($errors['email'])){?> <br/><span class="error"><?php echo $errors['email'] ?></span>
                        <?php } ?>
              
                    <div class="input_label">Amount:</div>
                    <input type="text" name="amount" class="input_field input_field--registration" value="<?php echo "$amount"?>" />
                        <?php if(isset($errors['amount'])){?> <br/><span class="error"><?php echo $errors['amount'] ?></span>
                        <?php } ?>
                        
                        <div class="input_label">Upload Proof: </div>
                        <input class="input_field input_field--registration" type="file" name="image_proof"  value="Upload" style="border-radius: 10rem;">

                    
                    <div class="btn_action">
                        <input type="submit" name="update" value="Update" class="btn_special" style="background-color: steelblue;width:15rem;margin-left: 50%;" />
                        <!--<a class="btn_special" href="register.php" style="background-color: springgreen;">Signup</a>-->
                        
                    </div>

                </div>
                </form>
            <?php if(isset($errors['limit'])){?> <br/><span class="error" style="font-size: 14px;"><?php echo $errors['limit'] ?></span>
                        <?php } ?>
             <?php if(isset($errors['account'])){?> <br/><span class="error" style="font-size: 14px;"><?php echo $errors['account'] ?></span>
                        <?php } ?>
            <?php if($display==1){?>
            <br/><label><?php echo "User wallet updated!!"?></label><?php } ?>
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