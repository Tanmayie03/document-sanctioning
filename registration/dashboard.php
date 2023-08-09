<!DOCTYPE html>
<html>
    <head>  
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="home.css"> 
    </head>
    <body>
        <div class="home1">
             <div class="firstnav">
                <img alt="" src="images/mit icon.png" />
                <img alt="" class="log-outimg" src="images/avatar.png" />
             </div>
            <div class="navBar">
                <div class="lists">
                <ul class="navlist">
                    <li><a class="active" href="/home.html"> Home</a></li>
                    <li><a class="docbar" href="/document.html">Document</a></li>
                    <li><a class="querybar" href="/query.html">Query</a></li>
                </ul>
                 
            </div>
            <div class="logout-info">
                <h4><a id="logOut" href="/login.html">LOG OUT</a></h4>
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
                        <div><label>Student Name:</label>
                        <input class="cName" type="text" placeholder="Name" readonly></div>
                        <div><label>Roll no:</label>
                        <input class="cRollno" type="text" placeholder="Roll no" readonly></div>
                        <div><label>Semester:</label>
                        <input class="cSem" type="text" placeholder="Semester" readonly></div>
                        <div><label>Division:</label>
                        <input class="cDiv" type="text" placeholder="Division" readonly></div>
                </form>
                
            </div>
        </div>
        <script src="home.js"></script> 
           
    </body>
</html>