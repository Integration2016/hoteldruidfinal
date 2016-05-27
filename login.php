<?php
    $connectie = mysqli_connect("localhost", "login", "Student1", "login");
    
    if(mysqli_connect_errno()) {
        echo "Kan geen verbinding maken: " . mysqli_connect_error();
    }
    
    $username = $_POST['user'];
    $password = $_POST['pass'];
        
    $username = stripslashes($username);
    $password = stripslashes($password);
    
    $sql = "SELECT * FROM gebruikers WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connectie,$sql);
    
    $aantalRijen = mysqli_num_rows($result);
    
    if($aantalRijen == 1) {
        setcookie("ingelogd","true");
        header("inizio.php");
    }
    else {
        $bericht = "username of password is verkeerd.";
        echo "<script type='text/javascript'>";
        echo "alert('$bericht');";
        echo "window.location.href = 'index.html';";
        echo  "</script>";
    }
        
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="refresh" content="3; url="inizio.php">
    <title>Logged in</title>
</head>
<body>
You are now logged in.
</body>
</html>