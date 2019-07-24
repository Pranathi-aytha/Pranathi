<?php
$db_name="train";
$pass="";
$mysql_user="root";
$server_name="localhost";
$conn=mysqli_connect($server_name,$mysql_user,$pass,$db_name);
if($conn)
{
$sql="CREATE TABLE IF NOT EXISTS 'usertable'(id integer primary key auto_increment,email varchar(100) unique key,username text,password text);";
$reserve="CREATE TABLE IF NOT EXISTS 'reservation'(reserveid integer primary key auto_increment,name varchar(100),age integer,gender varchar(100),remail varchar(100),dot date,dob date,amount integer);";
$train="CREATE TABLE IF NOT EXISTS 'traindisplay'(trainid integer primary key auto_increment,trainno integer unique key,trainname varchar(100) unique key,fromstn varchar(100),tostn varchar(100),arrival varchar(100),departure varchar(100),amount integer);";
 }
if (mysqli_query($conn,$sql)) {
     $insert="insert into usertable values(1,'pranathi@gmail.com','pranathi','pranathi');";
    mysqli_query($conn,$insert);	   
} 
if(mysqli_query($conn,$train)){
   $insert1="insert into traindisplay values(1,3245,'Simhadri','Visakapatnam','Nellore','21:35','5:00',1300);";
 mysqli_query($conn,$insert1);
}
?>