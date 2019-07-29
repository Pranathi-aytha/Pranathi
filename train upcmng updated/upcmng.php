<?php
include "init.php";

if (isset($_POST['previous']) || isset($_POST['upcmng'])){
	$sql1="SELECT id FROM usertable WHERE email='".$_COOKIE["username"]."';";

    	$result1=mysqli_query($conn,$sql1);
                    $row=mysqli_fetch_assoc($result1);
            $id=$row['id'];

if (isset($_POST['previous'])){
	
	//idokkate change renditiki
$sql2="SELECT * FROM reservation WHERE id='$id' and dot<'".date("Y-m-d")."';";
}

if (isset($_POST['upcmng'])){
	//idokkate change renditiki
$sql2="SELECT * FROM reservation WHERE id='$id'  and dot>'".date("Y-m-d")."';";
	}
    	$result2=mysqli_query($conn,$sql2);
                    echo "<br>";
				echo "<table align='center'>";
				if(mysqli_num_rows($result2)>0){
					echo "<tr>";
						echo "<th>Name</th>";
						echo "<th>Age</th>";
						echo "<th>Gender</th>";
						echo "<th>Date of Travel</th>";
						echo "<th>Date of Booking</th>";
						echo "<th>Train Name</th>";
						echo "<th>From Station</th>";
						echo "<th>To Station</th>";
						echo "<th>Amount</th>";
					echo "</tr>";
				while ($row = mysqli_fetch_assoc($result2)) { // Important line !!! Check summary get row on array ..
					//retrive train details using train id

					$sql3 = "SELECT * FROM traindisplay WHERE trainid='$trainid'";
				$result3 = mysqli_query($conn, $sql3);
				$row=mysqli_fetch_assoc($result3);
				$trainname=$row['trainname'];
				$fromstn=$row['fromstn'];
				$tostn=$row['tostn'];
				$amount=$row['amount'];
					echo "<tr>";
						echo "<td>".$row['name']."</td>";
						echo "<td>". $row['age']."</td>";
						echo "<td>".$row['gender']."</td>";
						echo "<td>".$row['dot']."</td>";
						echo "<td>".$row['dob']."</td>";
						echo "<td>". $row['trainname']."</td>";
						echo "<td>". $row['fromstn']."</td>";
						echo "<td>".$row['tostn']."</td>";
						echo "<td>".$row['amount']."</td>";

						if (isset($_POST['upcmng'])){
							echo "<form action=<?php echo $_SERVER['PHP_SELF'] ?> method=post><input type='hidden' name='reserveid' value='".$row['reserveid']."'>";
							echo "<td><input type='submit' name='cancel' value='Cancel' ></td></form>";
						}
						echo "</tr>";
				    }
				
				echo "</table>";
				}
			}
	if (isset($_POST['cancel'])){
		$sql="DELETE FROM reservation WHERE reserveid='".$_POST['reserveid']."';";
		if(mysqli_query($conn,$sql)){
			echo "success";
		}else{
			echo "fail"; 	 
		}
	}
?>
<html>
<head>
<title>View upcoming</title>
<style>
	.btn1{
position:fixed;
top:20%;
left:30%;
maargin-top:-100px;
margin-left:-200px;
}
.btn2{
position:fixed;
top:50%;
left:30%;
maargin-top:-100px;
margin-left:-200px;
}
body{
	background-image:url('images/view tickets.jpg');
background-repeat:no-repeat;
 background-size: cover;
}
table {
  border-collapse: collapse;
}
table, td, th {
  border: 1px solid black;
   padding: 15px;
  text-align: left;
}
</style>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<input type="submit" class="btn1" name="previous" value="Previous Tickets"/>
<input type="submit" class="btn2" name="upcmng" value="UpComing Tickets"/>
</form>
</body>
</html>
