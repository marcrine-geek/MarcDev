<?php

include('functions.php');
//if (!isLoggedIn()) {
//    $_SESSION['msg'] = "You must log in first";
//    header('location: login.php');
//}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>hello admin!</div>
<a href="../index.php?logout='1'" style="color: red;">logout</a>
</body>
</html>
