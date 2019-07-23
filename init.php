<?php
$db_name="train";
$pass="";
$mysql_user="root";
$server_name="localhost";
$conn=mysqli_connect($server_name,$mysql_user,$pass,$db_name);
if($conn)
{
$sql="CREATE TABLE IF NOT EXISTS usertable(id integer primary key auto_increment,email varchar(100) unique key,username text,password text);";
$train="CREATE TABLE IF NOT EXISTS train(id integer primary key auto_increment,trainname varchar(100) unique key,fromstn varchar(100),tostn varchar(100));";
$reserve="CREATE TABLE IF NOT EXISTS reservation(id integer primary key auto_increment,trainname varchar(100) unique key,date date);";

 }
if (mysqli_query($conn,$sql)) {
    $insert="insert into usertable values(1,'pranathi@gmail.com','pranathi','pranathi');";
    mysqli_query($conn,$insert);
} 
if(mysqli_query($conn,$train)){
    echo "Table creation failed: (" . $conn->errno . ") " . $conn->error;
}
if(mysqli_query($conn,$reserve)){
    echo "Table creation failed: (" . $conn->errno . ") " . $conn->error;
}
?>
