<?php
session_start(); 

$connect = mysqli_connect("localhost", "root", "", "registration") or die("Connection fail");

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    $sql = "SELECT * FROM login1 WHERE username = '$username' && password = '$password'"; 
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $studentName = $row['studentName'];
        $rollNo = $row['rollNo'];
        $semester = $row['semester'];
        $division = $row['divison'];
    } else {
        echo "No data found.";
    }
} else {
    echo "Session variables not set.";
}

$connect->close();
?>

<!DOCTYPE html>
<html>
<head>  
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="home.css"> 
</head>
<body>
    
         <div class="firstnav">
            <img alt="" src="images/mit icon.png" />
            <img alt="" class="log-outimg" src="images/avatar.png" />
         </div>
        <div class="navBar">
            <div class="lists">
            <ul class="navlist">
                <li><a class="active" href="./home.php"> Home</a></li>
                <li><a class="docbar" href="./document.php">Document</a></li>
                <li><a class="querybar" href="./query.php">Query</a></li>
            </ul>
             
        </div>
        <div class="logout-info">
            <h4><a id="logOut" href="./index.php">LOG OUT</a></h4>
            </div> 
        </div>
        <div class="DtTime">
            <div class="date"> <span id="date"></span></div>
            <div class="time"> <span id="time"></span></div>
        </div>
        <div class="login-info">               
            <img id="profile-pic" alt="" src="./images/avatar.png" />
            <div class="content">
                <form class="cForm">
                    <div>
                        <label>Student Name:</label>
                        <input class="cName" type="text" placeholder="Name" value="<?php echo $studentName; ?>" readonly>
                    </div>
                    <div>
                        <label>Roll no:</label>
                        <input class="cRollno" type="text" placeholder="Roll no" value="<?php echo $rollNo; ?>" readonly>
                    </div>
                    <div>
                        <label>Semester:</label>
                        <input class="cSem" type="text" placeholder="Semester" value="<?php echo $semester; ?>" readonly>
                    </div>
                    <div>
                        <label>Division:</label>
                        <input class="cDiv" type="text" placeholder="Division" value="<?php echo $division; ?>" readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="home.js"></script> 

</body>
</html>
