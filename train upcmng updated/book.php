<?php 
include "init.php";
$amount="";
$result=mysqli_query($conn,"SELECT amount FROM traindisplay WHERE trainid='".$_POST['train']."'");
	$row=mysqli_fetch_array($result);
	$amount= $row['amount'];
	?>
<!DOCTYPE html>
<html>
<head>
	<title> Find Train </title>
	<style>
body{
  background-image: url("https://www.desktop-background.com/t/2014/07/07/789786_background-images-for-websites_1920x1200_h.jpg");
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
</style>
</head>
<body>
	<div class="wrap">
		<!-- Header -->
		<div class="header">
			<div style="float:left;width:20px;">
				<img src="images/logo.jpg" height="270" width="300"/>
			</div>		
			<div>
			<div style="float:right; font-size:20px;margin-top:20px;">
</div>
			<div style="font-size:40px;margin-top:30px;">
				<center><h1>Indian Railways</h1></center>
			</div>
			</div>
		</div>	
		<div class="table">
<div align="center">
		<div class="span12 well">
		<div style="font-size:30px;">Book A Ticket</div>		
		<form name="signup"  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
		<table style="border-spacing:0 15px; ">
		<tr>
			<td style="border-top:0px;">Name <font color=red>* </font></td>
			<td style="border-top:0px;"><input type="text" name="name" placeholder="Enter the First name" onblur="return name1()"><span id="fn"></span></td>
		</tr>

	<tr>
			<td style="border-top:0px;"> Date of Travel <font color=red>* </font></td>
			<td style="border-top:0px;"><input type="date" class="input-block-level input-medium"  name="dot"> </td>
		</tr>
		<tr>
		<input type='hidden' name='train' value="<?php echo $_POST['train'] ?>" >
			<td style="border-top:0px;"> Gender <font color=red>* </font> </td>
			<td style="border-top:0px;"><select name="gnd">
				<option value="male">MALE</option>
				<option value="female">FEMALE</option>
			    </select>
			</td>
		</tr>	
		<tr>
			<td style="border-top:0px;">Age<font color=red>*</font></td>
			<td style="border-top:0px;"><input type="text" class="input-block-level"  name="age" placeholder="Enter your age"></td>
		</tr>
		<tr>
			<td style="border-top:0px;">Amount<font color=red>*</font></td>
			<td style="border-top:0px;"><p><?php echo $amount?></p></td>
		</tr>
		
		</table>
		<center><input type="submit" value="submit" name="submit" ></center>
		</form>
		</div>
		</div>
		</div>
		</body>
		</html>
		<?php
include "init.php";
$_POST['train'];
if (isset($_POST['submit'])){
    	$sql="SELECT id FROM usertable WHERE email='".$_COOKIE["username"]."';";
    	$result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
            $id=$row['id'];
    if(isset($_POST['dot'])){
            $dot=$_POST['dot'];
    }
    if(isset($_POST['name'])){
            $name=$_POST['name'];
    }
    if(isset($_POST['age'])){
            $age=$_POST['age'];
    }
    if(isset($_POST['gnd'])){
            $gender=$_POST['gnd'];
    }
    $train=$_POST['train'];
    if(isset($_POST['name'])){
            $username=$_POST['name'];
    }
    $sql = "INSERT INTO `reservation` (`reserveid`, `id`, `trainid`, `name`, `age`, `gender`, `dot`, `dob`)
    VALUES (NULL, '$id', '$train', '$name', '$age', '$gender', '$dot', '".date("Y-m-d")."');";
	
    if ($conn->query($sql)) {
                //echo "New Record has id ".$mysqli->insert_id;
                echo "<p>Booked successfully!</p>";
            } else {
                echo "<p>MySQL error no {$conn->errno} : {$conn->error}</p>";
                exit();
            }
}
?>