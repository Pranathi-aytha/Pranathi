<html>
<head>
    <title>Registration</title>
    <style>

body{

position:fixed;

top:20%;

bottom:50%;

left:50%;

margin-top:-100px;

margin-left:-100px;

background-color:powderblue;

}

</style>
</head>
<body>  

<?php
include "init.php";
if (!isset($_POST['signup'])) {
?>  <!-- The HTML registration form -->
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <center><img src="https://cdn3.vectorstock.com/i/thumb-large/19/22/retro-train-vintage-emblem-vector-20521922.jpg" alt="Cinque Terre" width="230" height="200"></center>
       <center> Username: <input type="text" name="username" /><br /></center>
       <center> Email: <input type="type" name="email" /><br /></center>
	<center>	Password: <input type="password" name="password" /><br ></center>
       <center> <input type="submit" name="signup" value="Register" /></center>
    </form>
<?php
} else {
## connect mysql server
    //             $result=mysqli_query($conn,$sql);
                
    // if ($result->connect_errno) {
    //     echo "<p>MySQL error no {$result->connect_errno} : {$result->connect_error}</p>";
    //     exit();
    // }
## query database
    # prepare data for insertion
    $username   = $_POST['username'];
    $email      = $_POST['email'];
	$password   = $_POST['password'];
    # check if username and email exist else insert
    $exists = 0;
    $result1 = $conn->query("SELECT username from usertable WHERE username = '{$username}' LIMIT 1");
    if ($result1->num_rows == 1) {
        $exists = 1;
        $result1 = $conn->query("SELECT email from usertable WHERE email = '{$email}' LIMIT 1");
        if ($result1->num_rows == 1) $exists = 2;    
    } else {
        $result1 = $conn->query("SELECT email from usertable WHERE email = '{$email}' LIMIT 1");
        if ($result1->num_rows == 1) $exists = 3;
    }

    if ($exists == 1) echo "<p>Username already exists!</p>";
    else if ($exists == 2) echo "<p>Username and Email already exists!</p>";
    else if ($exists == 3) echo "<p>Email already exists!</p>";
    else {
        # insert data into mysql database
        $sql = "INSERT INTO `usertable` (`id`, `email`, `username`, `password`) VALUES (NULL, '$email', '$username', '$password');";

        if ($conn->query($sql)) {
            //echo "New Record has id ".$mysqli->insert_id;
            echo "<p>Registred successfully!</p>";
        } else {
            echo "<p>MySQL error no {$conn->errno} : {$conn->error}</p>";
            exit();
        }
    }
}
?>      
</body>
</html>
