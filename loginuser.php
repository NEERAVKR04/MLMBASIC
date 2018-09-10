<?php
include './includes/db.inc.php';
$status_check=0;
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query_st="select * from users where email='$email' and password='$password'";
    require_once './includes/db.inc.php';
    $result_1=  mysqli_query($con,$query_st);
   if(mysqli_num_rows($result_1)==1)
   {
       $rows=  mysqli_fetch_assoc($result_1);
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
      <hr style="height:6px;width: 100%;background-color: #ED2F63"/>  
          
               <div style="display: box;line-height: 1.42857143;text-align: center;margin-bottom: 20px;font-size:13px;color:white;font-family: 'Open Sans','Helvetica Neue','Helvetica','Arial','sans-serif'">
                   <h1 style="margin-top: 5%;font-weight: 200;font-size: 36px;">MAKEASYLIFE.COM</h1><br><br>
                                <h3 style="font-size: 24px;font-weight:200;margin-bottom: 10px;">Site Login</h3>
<!--                <small style="font-size: 85%;font-weight: 200;">LOGIN</small>-->
            </div>
      <div id="content" class="registration">
            <h2 class="heading-primary">
                Login
            </h2>
      <form action="loginuser.php" method="POST">
                <table border="0" cellpadding="10">
                <tbody>
                    <tr>
                        <td class="input_label input_label--registration">Email:</td>
                        <td><input type="text" name="email" class="input_field input_field--registration" style="margin-left: 0.2rem;" value="<?php echo "$email"?>" />
                        
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="input_label input_label--registration">Password:</td>
                        <td><input type="password" name="password" class="input_field input_field--registration" style="margin-left: 0.2rem;" value="" />
                        
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="Login"  class="btn" style="margin: 2rem 8rem;"/>
                            

                        </td>
                            <!-- <a class="btn" style="margin: 2rem 8rem;">Home</a></td>                             -->
                        
                    </tr>
                    
                    
                </tbody>
            </table>
                
          &nbsp;&nbsp;<a href="register.php" class="link">Or, Register here</a>&nbsp;&nbsp;&nbsp;&nbsp;
           <br />
           <a href="index.php" class="link">Home</a>
           <?php if($status_check==2){ ?>
            <h2 style="color: red">Verify Your Account First.</h2>
            <h3>Click the verification link you received on Your mail!!</h3>
            <?php } ?>
            <?php if($status_check==3){ ?>
            <h2 style="color: red">Email Or, Password not match!!</h2>
            
            <?php } ?>
            </form>
    </div>
      
<!--        <div id="content" class="login-form">
            <h2 class="heading-primary">
                Login
            </h2>
            
            <?php if($status_check==2){ ?>
            <h2 style="color: red">Verify Your Account First.</h2>
            <h3>Click the verification link you received on Your mail!!</h3>
            <?php } ?>
            <?php if($status_check==3){ ?>
            <h2 style="color: red">Email Or, Password not match!!</h2>
            
            <?php } ?>
            
        </div>-->
        </body>
</html>