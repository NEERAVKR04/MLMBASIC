<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>MAKEASYLIFE</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles/default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<?php require_once './includes/guest/header.php';?>
</div>
<div id="menu">
	<?php require_once './includes/guest/menu.inc.php'; ?>
</div>
<style>
    .square{
        height: auto;
        width: 95%;
        display: block;
        text-align: justify;
        border: none;
        
        
        margin-left: 2%;
        margin-top: 3rem;
        
        font-size: 16px;
        color: #000;
        background-color: #fff;
        margin-bottom: 2%;
        border-radius: 10px;
        
        
    }
</style>
<div class="square">
    <h3 style="color:#000;text-align: center;">CONTACT US</h3>
    <b>If you are facing any issue or any query, feel free to contact & we will surely response as soon as possible </b>
<br/><br/>
<b>Email:</b> support@makeasylife.com
<br/><br/>

<img src="images/whatsapp_PNG21 (2).png" height="32px" width="32px;"> 
<br/><br/>

<b>Whatsapp:</b><label style="float:auto;margin-top: 1px;">+91 7096702667</label>
<br/><br/>
    <style>
        h3,p,label {
text-align:center;
font-family:'Raleway',sans-serif;
color:#006400
}
h2 {
font-family:'Raleway',sans-serif
}
input {
width:100%;
margin-bottom:20px;
padding:5px;
height:30px;
box-shadow:1px 1px 12px gray;
border-radius:3px;
border:none
}
textarea {
width:100%;
height:80px;
margin-top:10px;
padding:5px;
box-shadow:1px 1px 12px gray;
border-radius:3px
}
#send {
width:103%;
height:45px;
margin-top:40px;
border-radius:3px;
background-color:#cd853f;
border:1px solid #fff;
color:#fff;
font-family:'Raleway',sans-serif;
font-size:18px
}
div#feedback {
text-align:center;
height:520px;
width:330px;
padding:20px 25px 20px 15px;
background-color:#f3f3f3;
border-radius:3px;
border:1px solid #cd853f;
font-family:'Raleway',sans-serif;
float:left
}
.container {
width:960px;
margin:40px auto
}
    </style>
    <form action="email.php" id="form" method="post" name="form">
<input name="vname" placeholder="Your Name" type="text" value="">
<input name="vemail" placeholder="Your Email" type="text" value="">
<input name="sub" placeholder="Subject" type="text" value="">
<input readonly type="text" style="border:none;background: #fff;box-shadow: none;margin-bottom: 1px;" value="Your Suggestion/Feedback">
<textarea name="msg" placeholder="Type your text here..."></textarea>
<input id="send" name="submit" type="submit" value="Send Feedback">
</form>
<!--<h3><?php include "secure_email_code.php"?></h3>-->
</div>
    <div id="content2">
        <br/><br/>
<h3 style="color: #2980f3;
    font-family: sans-serif;
    font-size: 24.5px;
    text-transform: uppercase;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 3px;
    text-align: center">why users choose us?</h3>
    <h2 style="color: #5a5a5a;
    font-family: sans-serif;
    font-size: 18px;
    
    font-weight: 400;
    margin-top: 11px;
    
    text-align: center">Be lakhpati or crore pati by just opting our helping plan & refer your friends!!</h2>
        <ul>
            <li style="margin-left: 3rem;"><a href="privacy.php" style="font-size: 14px;">Privacy policy</a></li>
            <li style="margin-left: 3rem;"><a href="opportunities.php" style="font-size: 14px;">Business opportunities</a></li>

            <li style="margin-left: 3rem;"><a href="terms_conditions.php" style="font-size: 14px;">Terms & conditions</a></li>
            <li style="margin-left: 3rem;"><a href="register.php" style="font-size: 14px;">Register</a></li>

            <li style="margin-left: 3rem;"><a href="contact.php" style="font-size: 14px;">Contact Us</a></li>

            <li style="margin-left: 3rem;"><a href="howtowork.php" style="font-size: 14px;">How to work?</a></li>

            <li style="margin-left: 3rem;"><a href="loginuser.php" style="font-size: 14px;">Login</a></li>


        </ul>
    </div>

<div id="footer">
   <?php require_once './includes/guest/footer.php'; ?>
</div>
</body>
</html>
