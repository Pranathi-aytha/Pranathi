<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

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
  background-image: url("https://www.marlboroughflyer.co.nz/wp-content/uploads/2018/03/Pic-768x470.png");
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
  margin-top: 180px;
  margin-left: 800px;
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
</style>
</head>
<body>

  <form action="/action_page.php" class="container">
   <p><font color=#3498DB>New User?</font></p>
    <input type="button" class="btn" name="Sign Up" value="Sign Up" onClick="document.location.href='./Register1.php'"/>
    <br>
    <br>
    <input type="button" class="btn" name="Login" value="Login" onClick="document.location.href='./login.php'"/>
  </form>
     }
</body>
</html> 