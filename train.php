<?php
include "init1.php";
$fromname="";
$toname="";

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<div >
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
			<center>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<table class="table" style="margin-bottom:0px;">
				<tr>
					<th style="border-top:0px;"><label><b>Search Train</label></th>
					<td id="mbox" style="border-top:0px;">
					<label>From </label></td>
					<td style="border-top:0px;"><input  type="text" class="input-block-level" name="from" id="byn"></td>
					<td id="xbox" style="border-top:0px;"><label> To </label></td>
					<td style="border-top:0px;"><input id="xbox1" type="text" name="to" class="input-block-level" ></td>
					<td style="border-top:0px;"><input  type="submit" value="Find" name="find"> </td>
					<td style="border-top:0px;"><a class="btn btn-info" type="reset" value="Reset">Reset</a></td>
				</tr>
			</table>
			
			</form>
			<?php

				 if(isset($_POST['from']) && isset($_POST['to'])){
					$fromname= $_POST['from'];
					$toname= $_POST['to'];
				}
				if(isset($_POST['find'])){
					//echo $fromname;
				$sql = "SELECT * FROM traindisplay WHERE (fromstn='$fromname') and (tostn='$toname')";
				$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
				echo "<br>";
				echo "<table border='1'>";
				if(mysqli_num_rows($result)>0){
					echo "<tr>";
						echo "<th>Train No</th>";
						echo "<th>Train Name</th>";
						echo "<th>From Station</th>";
						echo "<th>To Station</th>";
						echo "<th>Arrival</th>";
						echo "<th>Departure</th>";
						echo "<th>Book</th>";
					echo "</tr>";
				while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..

					echo "<tr>";
						echo "<td>".$row['trainno']."</td>";
						echo "<td>". $row['trainname']."</td>";
						echo "<td>". $row['fromstn']."</td>";
						echo "<td>".$row['tostn']."</td>";
						echo "<td>".$row['arrival']."</td>";
						echo "<td>".$row['departure']."</td>";
						echo "<form action='/book' method=get>
						<input type='hidden' name='train' value='".$row['trainno']."'>
						<td><input type='submit' name='Book' value='Book'></td>
						</form>
						";
					echo "</tr></form>";
				    }

				}
				echo "</table>";
				}
			 ?>
</center>

</body>
</html>
