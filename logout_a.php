<?php
session_start();
if(isset($_SESSION['username'])){
    session_destroy();
    echo "<script> window.location.assign('admin_login.php'); </script>";
}
else{
    echo "<script> window.location.assign('admin_login.php'); </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>