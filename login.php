<?php
session_start();
include('functions.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        label
        {
            display: inline-block;
            width: 100px;
            font-size: 20px;
        }
        input[type="text"], [type="email"], [type="password"]
        {
            border-radius: 5px;
        }
        form
        {
            border: 2px solid black;
            width: 35%;
            text-align: center;
            border-radius: 10px;
            margin-left: 30%;
        }
        h1
        {
            text-align: center;
            margin-top: 15%;
            margin-right: 7%;
        }
    </style>
    <title>Login Form</title>
</head>
<body>
<div class="container" style="padding: 50px;">
    <h1><strong>MarcDev</strong></h1>
        <form action="login.php" method="post">
            <div style="padding: 20px;">
                <label for="uname">Username</label>
                <input type="text" name="uname" placeholder="Enter user name">
            </div>
            <div style="padding: 20px;">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter password">
            </div>
            <div style="padding: 20px;">
                <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
            </div>
        </form>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>
