<html>
<head>
    <title>Registration</title>
    <style>
html {
height:100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

body{
font-family: Arial, Helvetica, sans-serif;
  /* The image used */
  background-image: url("http://media1.santabanta.com/full1/Vehicles/Trains/trains-11a.jpg");


  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}


/* Add styles to the form container */
.container {
  position: center;
  right: 0;
  margin-top: 120px;
  margin-left: 200px;
  max-width: 400px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</head>
</style>
<body>  

<?php
include "init.php";
if (!isset($_POST['signup'])) {
?>  <!-- The HTML registration form -->
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="container">
       <h1>Sign Up</h1>
	<label for="UserName"><b>UserName</b></label>
   	<input type="text" placeholder="Enter your name" name="username" required>

    	<label for="email"><b>Email</b></label>
   	 <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
       <center>  <button type="submit" class="btn" name="signup" value="Register">Sign Up</button></center>
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