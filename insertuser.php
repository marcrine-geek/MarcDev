<?php
require 'connection.php';
if (isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['password']))
{
    //check if fields are not empty
    if (!empty(trim($_POST['uname'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['password'])))
    {
        //escape special characters
        $fname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['fname']));
        $lname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['lname']));
        $uname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['uname']));
        $email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));

        //check if email is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            //check if email is already in use
            $check_email = mysqli_query($connection, "SELECT `email` FROM `users` WHERE `email` = '$email'");

            if (mysqli_num_rows($check_email) > 0)
            {
                $error_message = "email is already in use";
            }
            else
            {
                //encrypt user password
                $user_hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                //insert user into database
                $insert_user = mysqli_query($connection, "INSERT INTO `users` (`fname`, `lname`, `uname`, `email`, `password`) VALUES ('$fname', '$lname', '$uname', '$email', '$user_hash_password')");

                if ($insert_user === TRUE)
                {
                    $success_message = "Registered successfully";
                }
                else
                {
                    $error_message = "Something went wrong!";
                }
            }
        }
        else
        {
            $error_message = "email address is invalid";
        }
    }
    else
    {
        $error_message = "Fill in required fields";
    }
}





























