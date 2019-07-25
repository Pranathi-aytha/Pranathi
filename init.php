<?php
$db_name="train";
$pass="";
$mysql_user="root";
$server_name="localhost";
$conn=mysqli_connect($server_name,$mysql_user,$pass,$db_name);
if($conn){
$sql="CREATE TABLE IF NOT EXISTS usertable(id integer primary key auto_increment,email varchar(100) unique key,username text,password text);";
$train="CREATE TABLE IF NOT EXISTS traindisplay(trainid integer primary key auto_increment,trainno integer unique key,trainname varchar(100) unique key,fromstn varchar(100),tostn varchar(100),arrival varchar(100),departure varchar(100),amount integer);";
$reserve="CREATE TABLE IF NOT EXISTS 'reservation'(reserveid integer primary key auto_increment,id integer,trainid integer,name varchar(100),age integer,gender varchar(100),remail varchar(100),dot date,dob date,amount integer,FOREIGN KEY (id) REFERENCES usertable(id),FOREIGN KEY (trainid) REFERENCES traindisplay(trainid));";
    if (mysqli_query($conn,$sql)) {
         $insert="insert into usertable values(1,'pranathi@gmail.com','pranathi','pranathi');";
        mysqli_query($conn,$insert);	   
    } 
    if(mysqli_query($conn,$train)){
       $insert1="insert into traindisplay values(1,3245,'Simhadri','Visakapatnam','Nellore','21:35','5:00',1300);";
     mysqli_query($conn,$insert1);
	   $insert2="insert into traindisplay values(2,12083,'Sarkar','Hyderabad','chennai','05:20','10:00',900);";
     mysqli_query($conn,$insert2);
	 $insert3="insert into traindisplay values(3,3546,'Hamsafar','Bhuvaneswar','chennai','19:05','04:25',450);";
     mysqli_query($conn,$insert3);
	 $insert4="insert into traindisplay values(4,2523,'ratnachal','visakapatnam','kolkatta','08:00','22:30',1800);";
     mysqli_query($conn,$insert4);
	 $insert5="insert into traindisplay values(5,45254,'Charminar','Hyderabad','Shiridi','13:00','07:00',860);";
     mysqli_query($conn,$insert5);
	 $insert6="insert into traindisplay values(6,9795,'pinakini','Bhuvaneswar','chennai','07:44','23:15',1000);";
     mysqli_query($conn,$insert6);
	$insert7="insert into traindisplay values(7,6832,'Jansathabdi','Visakapatnam','Nellore','06:35','15:00',300);";
     mysqli_query($conn,$insert7);
    }else{
        echo "fail train";
    }
if (mysqli_query($conn,$reserve)) {
    }
}
?>