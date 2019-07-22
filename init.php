<?php
$db_name="id8600325_reservation";
$pass="shouri25";
$mysql_user="id8600325_pranathi";
$server_name="localhost";

$conn=mysqli_connect($server_name,$mysql_user,$pass,$db_name);
// echo $conn;
// if($conn)
// echo 'fail';
// else
// echo "success";
if($conn)
// {

$sql="CREATE TABLE IF NOT EXISTS usertable(id integer primary key auto_increment,email varchar(100) unique key,username text,password text);" ;
// $runsql=mysqli_query($conn,$SQL);

// echo $runsql;
// }

if (mysqli_query($conn,$sql)) {
    $insert="insert into usertable values(1,'pranathi@gmail.com','pranathi','pranathi');";
    mysqli_query($conn,$insert);
//     echo "Table MyGuests created successfully";
} 
// else {
//     echo "Error creating table: " . $conn->error;
// }
?>
