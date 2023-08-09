<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    include("connection.php");

    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $DocumentName = $_POST['docName'];
        $Description = $_POST['descript'];
        $Authentication = $_POST['authenticate'];
        $query = "INSERT INTO FORM (username, DocumentName, Description, Authentication, Status) VALUES (?, ?, ?, ?, 'Pending')";
        $statement = mysqli_prepare($conn, $query);

        if ($statement) {
            mysqli_stmt_bind_param($statement, "ssss", $username, $DocumentName, $Description, $Authentication);
            mysqli_stmt_execute($statement);

            if (mysqli_stmt_affected_rows($statement) > 0) {
                // Data inserted successfully
                // echo "Data saved successfully.";
            } else {
                echo "Failed to insert data.";
            }

            mysqli_stmt_close($statement);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Session variables not set.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="document.css">
</head>
<body>
<div class="home">
    <div class="firstnav">
        <img alt="" src="images/mit icon.png"/>
        <img alt="" class="log-outimg" src="images/avatar.png"/>
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
            <h4><a class="logOut" href="./index.php">LOG OUT</a></h4>
        </div>
    </div>
    <div class="DtTime">
        <div class="date"> <span id="date"></span></div>
        <div class="time"> <span id="time"></span></div>
    </div>
    <div>
        <button type="submit" class="req-btn" onclick="openDialog()">New Request</button>
        <div class="model" id="dialogueBox">
            <form class="dialogueForm" method="POST" action="document.php">
                <label>Document Name :</label>
                <input type="text" id="docName" name="docName" required>
                <label>Description :</label>
                <input type="text" id="descript" name="descript" required>
                <label>Authentication :</label>
                <input type="text" id="authenticate" name="authenticate" required>
                <div class="btn">
                    <input type="submit" id="submit-btn" name="submit" value="Submit">
                </div>
            </form>
        </div>
        <table id="detailsTable">
            <thead>
            <tr>
                <th>Document Name</th>
                <th>Description</th>
                <th>Authentication By</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody id="detailsTableBody">
            <?php
            $query = "SELECT * FROM FORM WHERE username = ?";
            $statement = mysqli_prepare($conn, $query);
            
            if ($statement) {
                mysqli_stmt_bind_param($statement, "s", $username);
                mysqli_stmt_execute($statement);
                
                $data = mysqli_stmt_get_result($statement);
            
                if (mysqli_num_rows($data) > 0) {
                    while ($result = mysqli_fetch_assoc($data)) {
                        echo "<tr>
                                <td>" . $result['DocumentName'] . "</td>
                                <td>" . $result['Description'] . "</td>
                                <td>" . $result['Authentication'] . "</td>
                                <td>" . $result['Status'] . "</td>
                            </tr>";
                    }
                }
                
                mysqli_stmt_close($statement);
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            $conn->close();

            ?>
            </tbody>
        </table>
    </div>
    <script src="document.js"></script>
</body>
</html>
