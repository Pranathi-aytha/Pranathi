<?php
include "init.php";
if (isset($_POST['previous'])){
	$sql1="SELECT id FROM usertable WHERE email='".$_COOKIE["username"]."';";
    	$result1=mysqli_query($conn,$sql1);
                    $row=mysqli_fetch_assoc($result1);
            $id=$row['id'];
			$sql2="SELECT trainid FROM reservation WHERE id='$id';";
    	$result2=mysqli_query($conn,$sql2);
                    $row=mysqli_fetch_assoc($result2);
            $trainid=$row['trainid'];
	$sql3 = "SELECT * FROM traindisplay WHERE trainid='$trainid'";
				$result3 = mysqli_query($conn, $sql3); // First parameter is just return of "mysqli_connect()" function
				echo "<br>";
				echo "<table align='center' class='table1'>";
				if(mysqli_num_rows($result3)>0){
					echo "<tr>";
						echo "<th>Train No</th>";
						echo "<th>Train Name</th>";
						echo "<th>From Station</th>";
						echo "<th>To Station</th>";
						//echo "<th>Date of Travel</th>";
						//echo "<th>Date of Booking</th>";
						
					echo "</tr>";
				while ($row = mysqli_fetch_assoc($result3)) { // Important line !!! Check summary get row on array ..
					echo "<tr>";
						echo "<td>".$row['trainno']."</td>";
						echo "<td>". $row['trainname']."</td>";
						echo "<td>". $row['fromstn']."</td>";
						echo "<td>".$row['tostn']."</td>";
						//echo "<td>".$row['dot']."</td>";
						//echo "<td>".$row['dob']."</td>";
					echo "</form></tr>";
				    }
					
				}
				echo "</table>";
				$sql="SELECT trainid FROM reservation WHERE id='$id';";
    	$result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
            $trainid=$row['trainid'];
			
			$sql1="SELECT dot FROM reservation WHERE trainid='$trainid';";
    	$result1=mysqli_query($conn,$sql1);
                    $row=mysqli_fetch_assoc($result1);
            $dot=$row['dot'];
			$date=date("Y-m-d");
			$sql2 = "SELECT * FROM reservation WHERE $date>$dot";
				$result2 = mysqli_query($conn, $sql2); // First parameter is just return of "mysqli_connect()" function
				echo "<br>";
				echo "<table align='center'>";
				if(mysqli_num_rows($result2)>0){
					echo "<tr>";
						echo "<th>Name</th>";
						echo "<th>Age</th>";
						echo "<th>Gender</th>";
						echo "<th>Date of Travel</th>";
						echo "<th>Date of Booking</th>";
					echo "</tr>";
				while ($row = mysqli_fetch_assoc($result2)) { // Important line !!! Check summary get row on array ..
					echo "<tr>";
						echo "<td>".$row['name']."</td>";
						echo "<td>". $row['age']."</td>";
						echo "<td>".$row['gender']."</td>";
						echo "<td>".$row['dot']."</td>";
						echo "<td>".$row['dob']."</td>";
					echo "</form></tr>";
				    }
				}
				echo "</table>";
				}
				if (isset($_POST['upcmng'])){
	$sql1="SELECT id FROM usertable WHERE email='".$_COOKIE["username"]."';";
    	$result1=mysqli_query($conn,$sql1);
                    $row=mysqli_fetch_assoc($result1);
            $id=$row['id'];
			$sql2="SELECT trainid FROM reservation WHERE id='$id';";
    	$result2=mysqli_query($conn,$sql2);
                    $row=mysqli_fetch_assoc($result2);
            $trainid=$row['trainid'];
	$sql3 = "SELECT * FROM traindisplay WHERE trainid='$trainid'";
				$result3 = mysqli_query($conn, $sql3); // First parameter is just return of "mysqli_connect()" function
				echo "<br>";
				echo "<table align='center' class='table1'>";
				if(mysqli_num_rows($result3)>0){
					echo "<tr>";
						echo "<th>Train No</th>";
						echo "<th>Train Name</th>";
						echo "<th>From Station</th>";
						echo "<th>To Station</th>";
						//echo "<th>Date of Travel</th>";
						//echo "<th>Date of Booking</th>";
						
					echo "</tr>";
				while ($row = mysqli_fetch_assoc($result3)) { // Important line !!! Check summary get row on array ..
					echo "<tr>";
						echo "<td>".$row['trainno']."</td>";
						echo "<td>". $row['trainname']."</td>";
						echo "<td>". $row['fromstn']."</td>";
						echo "<td>".$row['tostn']."</td>";
						//echo "<td>".$row['dot']."</td>";
						//echo "<td>".$row['dob']."</td>";
					echo "</form></tr>";
				    }
					
				}
				echo "</table>";
				$sql="SELECT trainid FROM reservation WHERE id='$id';";
    	$result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
            $trainid=$row['trainid'];
			
			$sql1="SELECT dot FROM reservation WHERE trainid='$trainid';";
    	$result1=mysqli_query($conn,$sql1);
                    $row=mysqli_fetch_assoc($result1);
            $dot=$row['dot'];
			$date=date("Y-m-d");
			$sql2 = "SELECT * FROM reservation WHERE $date<$dot";
				$result2 = mysqli_query($conn, $sql2); // First parameter is just return of "mysqli_connect()" function
				echo "<br>";
				echo "<table align='center'>";
				if(mysqli_num_rows($result2)>0){
					echo "<tr>";
						echo "<th>Name</th>";
						echo "<th>Age</th>";
						echo "<th>Gender</th>";
						echo "<th>Date of Travel</th>";
						echo "<th>Date of Booking</th>";
					echo "</tr>";
				while ($row = mysqli_fetch_assoc($result2)) { // Important line !!! Check summary get row on array ..
					echo "<tr>";
						echo "<td>".$row['name']."</td>";
						echo "<td>". $row['age']."</td>";
						echo "<td>".$row['gender']."</td>";
						echo "<td>".$row['dot']."</td>";
						echo "<td>".$row['dob']."</td>";
					echo "</form></tr>";
				    }
				}
				echo "</table>";
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