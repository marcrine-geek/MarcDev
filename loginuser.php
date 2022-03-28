<?php
require 'connection.php';

if (isset($_POST['uname']) && isset($_POST['password']))
{
    //check if fields are not empty
    if (!empty(trim($_POST['uname'])) && !empty(trim($_POST['password'])))
    {
        //escape special characters
        $email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));

        //check if email exists
        $query = mysqli_query($connection, "SELECT `email` FROM `users` WHERE `email` = '$email'");

        //if email exists
        if (mysqli_num_rows($query) > 0)
        {
            $row = mysqli_fetch_assoc($query);
            $user_pass = $row['password'];

            //verify password
            $check_password = password_verify($_POST['password'], $user_pass);

            if ($check_password === TRUE)
            {
                session_regenerate_id(true);
                $_SESSION['email'] = $email;
                header('Location: home.php');
                exit;
            }
            else
            {
                $error_message = "Incorrect Email Address or Password.";
            }
        }
        else
        {
            $error_message = "Incorrect Email Address or Password.";
        }
    }
    else
    {
        $error_message = "Please fill in all the required fields.";
    }
}