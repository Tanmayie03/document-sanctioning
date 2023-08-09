
<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "responsivedoc";

    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if($conn)
    {
    //    echo "Connection success";
    }
    else{
        echo "Connection FAILED".mysqli_connect_error();
    }
?>