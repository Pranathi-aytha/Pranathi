<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<style>
BODY{
background-image:url("https://cdn.pixabay.com/photo/2016/11/08/20/43/paper-1809412_960_720.jpg");
}
button{
background-color:white;
}
</style>
</head>
<body>
<h1><center>Train Ticket Reservation</center></h1>
<center><img src="https://cdn.dribbble.com/users/48692/screenshots/2400016/spokaneempire-partial.png" alt="train" height="250" width="250"></center>
<br>
<center>
<input type="button"  style=" background-color:#WHITE; height: 50px; width: 120px" name="Viewticket" value="View Ticket" onClick="document.location.href='./upcmng.php'"/>
<br>
<input type="button"  style=" background-color:#WHITE; height: 50px; width: 120px" name="book" value="Book Ticket" onClick="document.location.href='./train.php'"/>
<br>
<input type="button"  style=" background-color:#WHITE; height: 50px; width: 120px" name="changepwd" value="Change Password" onClick="document.location.href='./changepwd.php'"/>
<br>
<input type="button" style=" background-color:#WHITE; height: 50px; width: 120px" name="logout" value="LogOut" onClick="document.location.href='./logout.php'"/>
</body>
</html>