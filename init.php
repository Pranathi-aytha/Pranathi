<?php


$db_name="id8600325_reservation";
$pass="shouri25";
$mysql_user="id8600325_pranathi";
$server_name="localhost";

$conn= new mysqli($server_name,$mysql_user,$pass,$db_name);
// echo $conn;
if($conn->connect_error)
echo 'fail';
else
echo "success";
if($conn)
// {
$sql="CREATE TABLE IF NOT EXISTS usertable(email text,username text,password text);" ;

// $runsql=mysqli_query($conn,$SQL);

// echo $runsql;
// }

if ($conn->query($sql)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
?>
<!-- INSERT INTO `usertable` (`email`, `username`, `password`) VALUES ('pranathi@gmail.com', 'pranathi', 'pranathi'); -->