<?php
include "init.php";
$eerr="";
$perr="";
$cerr="";
$succ="";
    if (isset($_POST['login'])) {
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
	
   }
if(isset($_COOKIE["username"])) {
 echo "Value is: " . $_COOKIE["username"];
 header('Location: home.php');
}
?>

<!DOCTYPE html>

<html>

<head>
<script src="https://www.google.com/recaptcha/api.js"></script>
<title>Login</title>

<style>
body{
position:fixed;
top:20%;
bottom:50%;
left:45%;
maargin-top:-100px;
margin-left:-100px;
background-image:url('images/trainmage.jpg');
background-repeat:no-repeat;
 background-size: cover;
}
.g-recaptcha{
position:center;
} 
</style>
<script type="text/javascript">
                 function Captcha(){
                     var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
                     var i;
                     for (i=0;i<6;i++){
                       var a = alpha[Math.floor(Math.random() * alpha.length)];
                       var b = alpha[Math.floor(Math.random() * alpha.length)];
                       var c = alpha[Math.floor(Math.random() * alpha.length)];
                       var d = alpha[Math.floor(Math.random() * alpha.length)];
                       var e = alpha[Math.floor(Math.random() * alpha.length)];
                       var f = alpha[Math.floor(Math.random() * alpha.length)];
                       var g = alpha[Math.floor(Math.random() * alpha.length)];
                      }
                    var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
                    document.getElementById("mainCaptcha").value = code
                  }
                  function ValidCaptcha(){
                      var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
                      var string2 = removeSpaces(document.getElementById('txtInput').value);
                      if (string1 == string2){
                        return true;
                      }
                      else{  
                    	window.alert("Please Enter Correct Captcha");  
                        return false;
                      }
                  }
                  function removeSpaces(string){
                    return string.split(' ').join('');
                  }			
</script> 
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<center><img src="images/loginpage.jpg" alt="Cinque Terre" width="230" height="200"></center>
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
<center><input type="submit" value="Login" name="login"  onclick="return ValidCaptcha() "/></center>
</form>
</body>
</div>
</body>
<body onload="Captcha();">
        <table>
          <tr>
           <td>
                 Text Captcha<br />
           </td>
          </tr>
          <tr>
           <td>
             <input type="text" id="mainCaptcha"/>
              <input type="button" id="refresh" value="Refresh" onclick="Captcha()" >
           </td>
          </tr>
          <tr>
           <td>
            <input type="text" id="txtInput"/>    
          </td>
         </tr>
         
      </table>
</body>
</html>