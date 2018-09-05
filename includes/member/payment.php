<?php
require_once './secure.inc.php';
$first_name=$_SESSION['first_name'];
$username=$_SESSION['username'];
$useremail=$_SESSION['email'];
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
          $package=$row['package'];
       }
   }
?>
<?php
//$status=0;
//if(isset($_POST['upload'])){
//$username=$_SESSION['username'];
//$imagename=$_FILES["paymentproof"]["name"];
//$transaction_id=$_POST['tid'];
//
//if($imagename==''){    
//    $status=1;
//}
//
//else{
//    $image_type=array(IMAGETYPE_JPEG,IMAGETYPE_PNG);
//    $detected_type=  exif_imagetype($_FILES['paymentproof']['tmp_name']);
//    $error=!in_array($detected_type, $image_type);
//    if(!in_array($detected_type, $image_type)){
//        
//        $status=2;
//    }
// else {
//    $imagetmp=  addslashes(file_get_contents($_FILES["paymentproof"]["tmp_name"]));
//    $insert_image="update users set payment_proof='$imagetmp',image_name='$imagename',tid='$transaction_id' where username='$username'";
//    require_once '../db.inc.php';
//    mysql_query($insert_image);
//    $useremail=$_POST['useremail'];
//    $purpose=$_POST['purpose'];
//    $amount=$_POST['amount'];
//    $status=3;
//    //check request table
//    $query_st="select * from request where email='$useremail'";
//    require_once '../db.inc.php';
//    $result_req=  mysql_query($query_st);
//    while($row_req=  mysql_fetch_array($result_req)){
//        $status_msg=$row_req['status'];
//    }
//      if($purpose=='Upgrade Plan' && $status_msg!='pending'){
//          date_default_timezone_set('Asia/Kolkata');
//          $date=  date('Y-m-d H:i:s');
//            $query_st="insert into request values('$useremail','$purpose','$amount','pending','$date')";
//            require_once '../db.inc.php';
//            mysql_query($query_st);
//      }
//      else{
//          $status=4;
//      }
//      
//    }
//    
//}
//    
//}
?>
<?php
$query_user="select * from users where email='$useremail'";
require_once '../db.inc.php';
$result_user=  mysql_query($query_user);
while ($row_user = mysql_fetch_array($result_user)) {
    $payment_approval=$row_user['payment_approval'];
    $payment_date=$row_user['date'];
    $tid=$row_user['tid'];
    $activation=$row_user['activation'];
}
$errors=array();
if(isset($_POST['upload'])){
    $tid=$_POST['tid'];
    $method=$_POST['method'];
if($payment_approval=='pending'){
    $errors['payment']="You have already submitted a request. Please wait for 24-48 hrs.";
}
if($activation=='Y'){
    $errors['activation']="Your id is already active";
}
if($tid==''){
    $errors['tid']="Enter transaction Id !!";
}

        date_default_timezone_set('Asia/Kolkata');
        $date=  date('Y-m-d H:i:s');
        //thumbnail
        
    $file_name=$_FILES["paymentproof"]["name"];
    
    $file_size=$_FILES["paymentproof"]["size"];
    $file_tmp=$_FILES["paymentproof"]["tmp_name"];
    $file_type=$_FILES["paymentproof"]["type"];
    $file_ext=  strtolower(end(explode('.',$_FILES["paymentproof"]["name"])));
    $extensions=array("jpeg","jpg","png");
    if(in_array($file_ext, $extensions)===false){
        $errors['extension']="extension not allowed, please choose a jpeg, jpg or png file";
    }
    if($file_size>2097152){
        $errors['file_size']="File size must be upto 2MB Only";
    }
    
    if(count($errors)==0)
    {
        $image_name=$username.$file_name;
        echo "$image_name";
    $query_payment="update users set image_name='$image_name',tid='$tid',payment_approval='pending',payment_method='$method',date='$date' where email='$useremail'";
    require_once '../db.inc.php';
    mysql_query($query_payment);
    if(empty($errors)==true){
        move_uploaded_file($file_tmp, "payments/".$image_name);
        
        
    }else{
        
    }
    
      
   }  
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Payment/Upgrade Interface</title>
 
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
    .square{
        height: auto;
        width: 70%;
        display: grid;
        border: 1px solid #e4e5e7;
        display: inline-block;
        float: left;
        margin-left: 8%;
        margin-top: 5rem;
        text-align: center;
        font-size: 20px;
        color: #4773C1;
        background-color: #eee;
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
       
    }
    .login-labels{
        margin-top: 2rem;
        width: 10rem;
        border:none;
        background: none;
        text-align: center;
        font-size: 14px;
        font-weight: bold;
    }
</style>

<div class="square">
    
    <form class="login-forms" action="payment.php" method="POST" enctype="multipart/form-data">
        <h2>
            Payment Details
        </h2>
        <table id="history">
            <input readonly type="text" class="login-labels"value="Email:">
                <input class="login-fields" type="text" readonly name="email" value="<?php echo "$useremail"; ?>">
                <?php if(isset($errors['activation'])){?> <br/><span class="error"><?php echo $errors['activation'] ?></span>
                        <?php } ?>

                <br/>
                <input readonly type="text" class="login-labels" value="Purpose:">
                <input class="login-fields" type="text" readonly name="email" value="Activation Charge">
                <br/>
                <input readonly type="text" class="login-labels" value="Amount:">
                <input class="login-fields" type="text" readonly name="email" value="Rs 99/-">
                <br/>
                <input readonly type="text" class="login-labels" value="Transaction Id:">
                <input class="login-fields" type="text" name="tid" value="">
                <?php if(isset($errors['tid'])){?> <br/><span class="error"><?php echo $errors['tid'] ?></span>
                        <?php } ?>
                <br/>
                <input readonly type="text" class="login-labels" value="Method:">
                
                <select class="login-fields" type="text" name="method" value="">
                    <option selected>Bank Transfer</option>
                    <option>UPI</option>
                    <option>PayTM</option>
                    <option>PayPal</option>
                </select>
              
                <br/>
                <input readonly type="text" class="login-labels" value="Upload Proof:">

                <input type="file" name="paymentproof" value="Upload Proof">
    <?php if(isset($errors['extension'])){?> <br/><span class="error"><?php echo $errors['extension'] ?></span>
                        <?php } ?>

                <br/>
                <input type="submit" name="upload" value="Save" class="btn_special" style="background-color: steelblue;margin-bottom: 5px;" />
                <input type="submit" name="cancel" value="Cancel" class="btn_special" style="background-color: tomato;margin-bottom: 5px;" />
                           <?php if(isset($errors['payment'])){?> <br/><span class="error"><?php echo $errors['payment'] ?></span>
                        <?php } ?>


            
        </table>
        </form>
</div>

   
            




    
  
<div id="footer">
   <?php require_once './footer.php'; ?>
</div>
</body>
</html>
