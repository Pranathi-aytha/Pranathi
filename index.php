<?php
// include "init.php";
$eerr="";
$perr="";
$cerr="";
$succ="";
    if (isset($_POST['signin'])) {
        if(!empty($_POST['g-recaptcha-response'])){
        
       $email= $_POST['email'];
       if(preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email)){
        $password=$_POST['password'];
            if(strlen($password)>=8){
                $sql="select count(*) as total from usertable where email='$email' and password='$password'";
                $result=mysqli_query($conn,$sql);
                $data=mysqli_fetch_assoc($result);
                if($data['total']=='1'){

                    setcookie("username", $email, time() + (86400 * 30), "/"); // 86400 = 1 day
                    header('Location: home.php');
                }else{

                    $succ="<center><p>Invalid username or Password</p></center>";
                }
            }else {
                $perr="<center><p class='error'>Please Enter Valid password</p></center>";
            }
       }else{
         $eerr="<center><p class='error'>Please Enter Valid email</p></center>";
       }
   }else{
        $cerr="<center><p class='error'>Please verift the captcha</p></center>";
   }
}
?>

<!DOCTYPE html>

<html>

<head>
<script src="https://www.google.com/recaptcha/api.js"></script>
<style type="text/css">
    .error{
        color: :'red';
    }
</style>
<title>Login</title>

<style>

body{

position:fixed;

top:20%;

bottom:50%;

left:50%;

maargin-top:-100px;

margin-left:-100px;

background-color:powderblue;

}

</style>

</head>

<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

<center><img src="https://cdn3.vectorstock.com/i/thumb-large/19/22/retro-train-vintage-emblem-vector-20521922.jpg" alt="Cinque Terre" width="230" height="200"></center>

  <div class="topleft"></div>

<center>username<input id="username" name="email" type="email" placeholder="Enter mail" required="false"></center>
<?php 
        echo $eerr;
        ?>
<br>

<center>password <input id="password" type="password" name="password" placeholder="Enter password" required="true"></center>
<?php 
        echo $perr;
        ?>

<br>

<div class="g-recaptcha" data-sitekey=" 6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
<?php 
        echo $cerr;
        ?>
<center><input id="login" type="submit" value="Login" name="signin" ></center>

</form>
<?php echo $succ ?>
</body>
</html>