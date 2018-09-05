<?php
$status_check=0;
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query_st="select * from users where email='$email' and password='$password'";
    require_once './includes/db.inc.php';
    $result_1=  mysql_query($query_st);
   if(mysql_num_rows($result_1)==1)
   {
       $rows=  mysql_fetch_assoc($result_1);
       if($rows['verified']==Y)
       {
           session_start();
           $role=$rows['role'];
           $first_name=$rows['first_name'];
           $email=$rows['email'];
           $username=$rows['username'];
           $_SESSION['first_name']= $first_name;
              $_SESSION['role']= $role;
              $_SESSION['email']= $email;
              $_SESSION['username']=$username;
              
              if($role=='admin')
              {
                  header('Location:./includes/admin/index.php');
              }
              else{
                  if($role=='member'){
                  header('Location:./includes/member/index.php');
              }
              }    
       }
       else{
           $status_check=2;
          
       }
   }
   else{
       $status_check=3;
   }
    
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
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body style="background-color: #798F9D">
      <hr style="height:6px;background-color: #ED2F63"/>  
          
               <div style="display: box;line-height: 1.42857143;text-align: center;margin-bottom: 20px;font-size:13px;color:white;font-family: 'Open Sans','Helvetica Neue','Helvetica','Arial','sans-serif'">
                   <h1 style="margin-top: 5%;font-weight: 200;font-size: 36px;">MLMSoftware.one Demo</h1><br><br>
                                <h3 style="font-size: 24px;font-weight:200;margin-bottom: 10px;">Site Login</h3>
<!--                <small style="font-size: 85%;font-weight: 200;">LOGIN</small>-->
            </div>
        <div id="content" class="login-form">
            <h2 class="heading-primary">
                Login
            </h2>
            <form action="loginuser.php" method="POST">
                <div class="login_details">
                    <div class="input_label">Email:</div>
                    <input type="text" name="email" class="input_field" value="<?php echo "$email"?>" />

                    <div class="input_label">Password:</div>
                    <input type="password" name="password" class="input_field" value="" />

                    <div class="btn_action">
                        <input type="submit" name="submit" value="Login" class="btn_special" style="background-color: steelblue;" />
                        <a class="btn_special" href="register.php" style="background-color: springgreen;">Signup</a>
                        <a class="btn_special" href="index.php" style="background-color: #eb2f64;">Home</a>   
                    </div>
                    
                            
                </div>
            </form>
            <?php if($status_check==2){ ?>
            <h2 style="color: red">Verify Your Account First.</h2>
            <h3>Click the verification link you received on Your mail!!</h3>
            <?php } ?>
            <?php if($status_check==3){ ?>
            <h2 style="color: red">Email Or, Password not match!!</h2>
            
            <?php } ?>
            
        </div>
    <div style="width: 100%;
	overflow: hidden;
	margin-left: 0px;
        min-height: 370px;
        background-color: #F7F6F6;
        margin-top: 30rem;">
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
<div id="footer">
   <?php require_once './includes/guest/footer.php'; ?>
</div>

    
    </body>
</html>