<?php
$connection = mysqli_connect("localhost", "root", "", "marcdev");

//checking connection
if (mysqli_connect_errno())
{
    echo "connection failed".mysqli_connect_error();
}
