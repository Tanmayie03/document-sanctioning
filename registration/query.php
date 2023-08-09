<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $connect = mysqli_connect("localhost", "root", "", "registration") or die("Connection fail");
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $message = mysqli_real_escape_string($connect, $_POST['message']);
    $query = "INSERT INTO querytable (name, email, message) VALUES ('$name', '$email', '$message')";
    $result = mysqli_query($connect, $query);
    
    $connect->close();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Query</title>
        <link rel="stylesheet" type="text/css" href="query.css"> 
    </head>
    <body>
        <div class="home">
            <div class="firstnav">
                <img alt="" src="images/mit icon.png" />
                <img alt="" class="log-outimg" src="images/avatar.png" />
            </div> 
            <div class="navBar">
                <div class="lists">
                    <ul class="navlist">
                        <li><a class="active" href="./home.php">Home</a></li>
                        <li><a class="docbar" href="./document.php">Document</a></li>
                        <li><a class="querybar" href="./query.php">Query</a></li>
                    </ul>
                </div>
                <div class="logout-info">
                    <h4><a class="logOut" href="./index.php">LOG OUT</a></h4>
                </div>
            </div>
            <div class="DtTime">
                <div class="date"> <span id="date"></span></div>
                <div class="time"> <span id="time"></span></div>
            </div>
            <div class="queryForm">

            <form method="POST" action="#" class="qForm">
                <label>Name</label>
                <div><input class="qName" type="text" placeholder="Your Name" name="name" required></div>
                <label>Email</label>
                <div><input class="qMail" type="email" placeholder="Your Email Id" name="email" required></div>
                <label>Message</label>
                <div><input class="qMsg" type="text" placeholder="Your Message" name="message" required></div>
                <input class="sub-btn" type="submit" name="submit" value="Submit">            
            </form>

            </div>
        </div>
        
        <script src="query.js"></script>
    </body>
</html>
