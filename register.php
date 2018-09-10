<?php
    $status=0;
    $template=1;
    $first_name='';
    $last_name='';
    $email='';
    $mobile='';
    $password='';
    $cnf_password='';
    $package='';
    $refer_code='';
    $errors= array();
    
if(isset($_GET['submit'])){
    $con=  mysqli_connect($host, $user, $password, $database, $port, $socket)
    session_start();
    $first_name=$_GET['first_name'];
    $last_name=$_GET['last_name'];
    $email=$_GET['email'];
    $mobile=$_GET['mobile'];
    $password=$_GET['password'];
    $cnf_password=$_GET['cnf_password'];
    $package=$_GET['package'];
    if($package=="5$")
    {
        $package_name='Silver';
    }
    if($package=="12$")
    {
        $package_name='Gold';
    }
    if($package=="21$")
    {
        $package_name='Sub Diamond';
    }
    if($package=="50$")
    {
        $package_name='Diamond';
    }
    if($package=="99$")
    {
        $package_name='Platinum';
    }
    
    $refer_code=$_GET['refer_code'];
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    if(empty($first_name)){
        
        $errors['first_name']="First Name required!!";
    }
    if(empty($last_name)){
        $errors['last_name']="Last Name required!!";
    }
    if(empty($email)){
        $errors['email']="Email required!!";
    }
    if(empty($password)){
        $errors['password']="Password can't be empty!!";
    }
    if(empty($cnf_password)){
        $errors['cnf_password']="Confirm Password can't be empty!!";
    }
    if(empty($mobile)){
        $errors['mobile']="Mobile number required!!";
    }
    if(empty($package)){
        $errors['package']="Select Package!!";
    }
    if(count($errors)==0)
    {
        if(strlen($password)<6)
        {
            $errors['password']="Password must be atleast of 6 character";
        }
        if($password!=$cnf_password)
        {
            $errors['cnf_password']="Confirm password not matches!!";
        }
        if(!preg_match('/^[A-Za-z0-9]+@[A-Za-z0-9]+\.[A-Za-z]+$/', $email)){
            $errors['email']="Email id not valid!!";
        }
        if($email=='abc@example.com' || $email=='123@example.com' || $email=='abcd@example'){
            $errors['email']="Email id not valid!!";

        }
        if(strlen($mobile)!=10)
        {
            $errors['mobile']="Mobile number must be of 10 digit";
        }
        }
        
        
        if(count($errors)==0)
        {
    $query_st="select * from users where email='$email'";
    require_once './includes/db.inc.php';
    $result_1=  mysqli_query($con,$query_st);
   if(mysqli_num_rows($result_1)==1){
       $errors['email']="Email id already exists";
   }
   
   $query_rfr="select first_name from users where referral_code='$refer_code'";
   require_once './includes/db.inc.php';
   $result_rfr=mysqli_query($con,$query_rfr);
   if(mysqli_num_rows($result_rfr)>0)
   {
     
       while ($row = mysqli_fetch_assoc($result_rfr)) {
          $referee_name= $row["first_name"];
       }
     
   }
   
   
   $query_count="select referral_count from users where referral_code='$refer_code'";
          require_once './includes/db.inc.php';
          $result_count=  mysqli_query($con,$query_count);
          if(mysqli_num_rows($result_count)>=0)
          {
              while ($row_count = mysqli_fetch_assoc($result_count)) {
                  
              $referral_count=$row_count["referral_count"];
              $referral_count=$referral_count+1;
              $query_referral_count_update="update users set referral_count='$referral_count' where referral_code='$refer_code'";
              mysqli_query($con,$query_referral_count_update);
              }
          }
   
        }
        if(count($errors)==0){
            //verification code
            $string='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#$&!';
            $string= str_shuffle($string);
            $verification=  substr($string,0,12);
            $_SESSION['verification']=$verification;
            $str=substr($email,0,8);
            $username=$str;
           
            $str_referral=substr($first_name,0,3).strtoupper($str_referral);
            $str_referral= strtoupper($str_referral);
            
            $digit_rfr='0123456789';
            $digit_rfr=  str_shuffle($digit_rfr);
            $digit=substr($digit_rfr,0,4);
            $referral_code=$str_referral.$digit;
            
            $password=  md5($password);
            date_default_timezone_set('Asia/Kolkata');
            $joined_date=  date('Y-m-d H:i:s');
            $query= "insert into users values('$username','$email','$first_name','$last_name','$password','$mobile','$package','$refer_code','$referee_name','$referral_code','$verification','Y','N','member','0','0','0','','','','','','','','','','','','$joined_date')";
            require_once './includes/db.inc.php';
            //mysql_query($query);
            mysqli_query($con,$query);
            $template=2;     
        }   
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="css/style.css">
    </head>
    
        <body style="background-color: #798F9D">
            <hr style="height:6px;width: 100%;background-color: #ED2F63"/> 
          
               <div style="display: box;line-height: 1.42857143;text-align: center;margin-bottom: 20px;font-size:13px;color:white;font-family: 'Open Sans','Helvetica Neue','Helvetica','Arial','sans-serif'">
                   <h1 style="margin-top: 5%;font-weight: 200;font-size: 36px;">MAKEASYLIFE.COM</h1><br><br>
                                <h3 style="font-size: 24px;font-weight:200;margin-bottom: 10px;">Site Register</h3>
<!--                <small style="font-size: 85%;font-weight: 200;">LOGIN</small>-->
            </div>
        
        <div id="content" class="registration">
            <?php if($template==1){ ?>
            <h2 class="heading-primary">
                Register
            </h2>
            <form action="register.php" method="GET">
                <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td class="input_label input_label--registration">Email:</td>
                        <td><input type="text" name="email" class="input_field input_field--registration" value="<?php echo "$email"?>" />
                        <?php if(isset($errors['email'])){?> <br/><span class="error"><?php echo $errors['email'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">First Name:</td>
                        <td><input type="text" name="first_name" class="input_field input_field--registration" value="<?php echo "$first_name"?>" />
                        <?php if(isset($errors['first_name'])){?><br/> <span class="error"><?php echo $errors['first_name'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Last Name:</td>
                        <td><input type="text" name="last_name" class="input_field input_field--registration" value="<?php echo "$last_name"?>" />
                        <?php if(isset($errors['last_name'])){?><br/> <span class="error"><?php echo $errors['last_name'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Password:</td>
                        <td><input type="password" name="password" class="input_field input_field--registration" value="" />
                        <?php if(isset($errors['password'])){?> <span class="error"><?php echo $errors['password'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Confirm Password:</td>
                        <td><input type="password" name="cnf_password" value="" class="input_field input_field--registration"  />
                        <?php if(isset($errors['cnf_password'])){?> <span class="error"><?php echo $errors['cnf_password'] ?></span>
                        <?php } ?>
                       
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Mobile:</td>
                        <td><input type="text" name="mobile" class="input_field input_field--registration"  value="<?php echo "$mobile"?>" />
                        <?php if(isset($errors['mobile'])){?> <span class="error"><?php echo $errors['mobile'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration"><label>Package Price:</td>
                        <td><input readonly type="text" name="package" class="input_field input_field--registration" value="Rs 99/-" />
                                       
                           
                        <?php if(isset($errors['package'])){?> <span class="error"><?php echo $errors['package'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="input_label input_label--registration">Refer Code:</td>
                        <td><input type="text" name="refer_code" placeholder="If any (optional)" class="input_field input_field--registration" value="<?php echo "$refer_code"?>" />
                        <?php if(isset($errors['refer_code'])){?> <span class="error"><?php echo $errors['refer_code'] ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="Register"  class="btn" style="margin: 2rem 8rem;"/>
                            

                        </td>
                            <!-- <a class="btn" style="margin: 2rem 8rem;">Home</a></td>                             -->
                        
                    </tr>
                    
                    
                </tbody>
            </table>
                
                &nbsp;&nbsp;<a href="loginuser.php" class="link">Or, Already a member?</a>&nbsp;&nbsp;&nbsp;&nbsp;
           <br />
           <a href="index.php" class="link">Home</a>
            </form>
            
            <?php } ?>
            <?php if($template==2){ 
                
                /*$to      = $email;
                
$subject = 'Account verification required';
$message = 'Verification code is:';
$headers = 'From: neeravkr04@gmail.com' . "\r\n" .
   'Reply-To: neeravkr04@gmail.com';

mail($to, $subject, $message, $headers);*/
                mail("$email",'MAKEASYLIFE Registration Success!!','You have successfully registered on makeasylife.com. To activate your account login on makeasylife.com & pay Rs 99/- as helping charge!! Wish you happy earning.','From:noreply@makeasylife.com');
                ?>
            <h2>Congratulations!! Registered Successfully </h2>
            <h3>Login with your <?php echo "$email" ?> and make payment of Rs 99/- to fully activate your account<a href="loginuser.php"><b>&nbsp;Login</b></a></h3>
            <?php } ?>

            
        </div>
    

    </body>
</html>
