<?php

function fetchSamples($connection)
{
    $query = mysqli_query($connection, "SELECT * FROM `samples`");
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function fetchRequests($connection)
{
    $query = mysqli_query($connection, "SELECT * FROM `requests`");
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function fetchComments($connection)
{
    $query = mysqli_query($connection, "SELECT * FROM `comments`");
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function fetchUsers($connection)
{
    $query = mysqli_query($connection, "SELECT * FROM `users`");
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function fetchUser($connection, $id)
{
    $id = mysqli_real_escape_string($connection, $id);
    $query = mysqli_query($connection, "SELECT * FROM `users` WHERE `id` = '$id'");
    $user = mysqli_fetch_assoc($query);
    if (!count($user))
    {
        header('Location: index.php');
        exit;
    }
    return $user;
}
