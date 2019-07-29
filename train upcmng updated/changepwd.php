<html>
     <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Password Change</title>
	<style>
	body{
position:fixed;
top:30%;
left:55%;
maargin-top:-100px;
margin-left:-200px;
}
</style>
     </head>
    <body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <table>
    <tr>
   <td>Enter your UserName</td>
    <td><input type="username" size="10" name="username"></td>
    </tr>
    <tr>
    <td>Enter your existing password:</td>
    <td><input type="password" size="10" name="password"></td>
    </tr>
  <tr>
    <td>Enter your new password:</td>
    <td><input type="password" size="10" name="newpassword"></td>
    </tr>
    <tr>
   <td>Re-enter your new password:</td>
   <td><input type="password" size="10" name="confirmnewpassword"></td>
    </tr>
    </table>
    <p><input type="submit" name="submit" value="Update Password">
    </form>
		</body>
		</html>
   <?php
   session_start();
include 'init.php';
if(isset($_POST['submit'])){
	if(isset($_POST['username'])){
$username = $_POST['username'];
}
if(isset($_POST['password'])){
        $oldpassword = $_POST['password'];
	}
	if(isset($_POST['newpassword'])){
        $newpassword = $_POST['newpassword'];
	}
	if(isset($_POST['confirmnewpassword'])){
        $confirmnewpassword = $_POST['confirmnewpassword'];
	}
        $sql="SELECT password FROM usertable WHERE username='$username'";
		$result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
		
		$oldpassworddb = $row['password'];
		if ($oldpassword==$oldpassworddb)
		{
		//check twonew pass
		if ($newpassword==$confirmnewpassword)
		{
		//success
		//change pass in db
		 if(strlen($newpassword)<8)  
		{
		 echo "Password must be 8 characters";
		}
	else
		{
				$sql1= "UPDATE usertable SET password='$newpassword' WHERE username='$username'";
				$result=mysqli_query($conn,$sql1);
				session_destroy();
				echo "Your password has been Updated";
		}
		}
        else{
				die("New Pass don't match");
		}
		}
		else {
			die("Old Pass doesn't match");
		}
		}
	
      ?