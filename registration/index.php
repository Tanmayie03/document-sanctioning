<?php
session_start(); 

$connect = mysqli_connect("localhost", "root", "", "registration") or die("Connection fail");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM login1 WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connect, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: home.php");
        exit();
    } else {
        echo "Login Not Successful";
    }
}

$connect->close();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="login.css"> 
  
</head>
<body>
  <div class="main">
    <div class="paragraph">
      <h1><b class="mit-group">Maharashtra Institute of Technology</b></h1> 
      <p class="mit-para">
        MIT constantly strives for excellence in pedagogy. Human beings
        evolve, and a key enabler of this evolutionary process is knowledge
        which helps us demystify and understand nature. MIT considers
        education and training as a continuous process of human development,
        aptly described by its vision statement; 'Quest for Excellence'
      </p>
    </div>
    <div class="log-container">
      <h3>Welcome! Log in here</h3>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="loginForm" method="POST">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="submit" id="login-btn" name="submit" value="Login">
      </form>
    </div>
  </div>
  <script src="login.js"></script>  
</body>
</html>
