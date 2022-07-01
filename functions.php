<?php
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'marcdev');

// variable declaration
$fname = "";
$lname = "";
$uname = "";
$email    = "";
$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
    register();
}

//call the request() function when submit project request button is clicked
if (isset($_POST['request'])){
    request();
}

//call the sample() function when sample button is clicked
if (isset($_POST['sample'])){
    sample();
}

//call the send() function when send is clicked
if (isset($_POST['send']))
{
    send();
}

//send message
function send(){
    global $db;

    $name = e($_POST['name']);
    $email = e($_POST['email']);
    $subject = e($_POST['subject']);
    $message= e($_POST['message']);

    $query = "INSERT INTO messages (name, email, subject, message) VALUES('$name', '$email', '$subject', '$message')";
    mysqli_query($db, $query);

    header('location: contactus.php');
}


//sample projects
function sample(){
    //variables
    global $db;

    //receive input
    $project    =  e($_POST['project']);
    $typeofproject    =  e($_POST['typeofproject']);
    $details    =  e($_POST['details']);

    $query = "INSERT INTO samples (project, typeofproject, details) 
					  VALUES('$project','$typeofproject', '$details')";
    mysqli_query($db, $query);

    header('location: sample.php');

}

//Request project
function request(){
    //variables
    global $db;

    //receive input
    $project    =  e($_POST['project']);
    $typeofproject    =  e($_POST['typeofproject']);
    $details    =  e($_POST['details']);
    $amount       =  e($_POST['amount']);

    $query = "INSERT INTO requests (project, typeofproject, details, amount) 
					  VALUES('$project','$typeofproject', '$details', '$amount')";
    mysqli_query($db, $query);

    header('location: request.php');

}

// REGISTER USER
function register(){
    // call these variables with the global keyword to make them available in function
    global $db, $errors, $uname, $email;

    // receive all input values from the form. Call the e() function
    // defined below to escape form values
    $fname    =  e($_POST['fname']);
    $lname    =  e($_POST['lname']);
    $uname    =  e($_POST['uname']);
    $email       =  e($_POST['email']);
    $password_1  =  e($_POST['password_1']);
    $password_2  =  e($_POST['password_2']);

    // form validation: ensure that the form is correctly filled
    if (empty($fname)) {
        array_push($errors, "Firstname is required");
    }
    if (empty($lname)) {
        array_push($errors, "Lastname is required");
    }
    if (empty($uname)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        if (isset($_POST['user_type'])) {
            $user_type = e($_POST['user_type']);
            $query = "INSERT INTO users (fname, lname, uname, email, user_type, password) 
					  VALUES('$fname', '$lname', '$uname', '$email', '$user_type', '$password')";
            mysqli_query($db, $query);
            $_SESSION['success']  = "New user successfully created!!";
            header('location: home.php');
        }else{
            $query = "INSERT INTO users (fname, lname, uname, email, user_type, password) 
					  VALUES('$fname','$lname', '$uname', '$email', 'user', '$password')";
            mysqli_query($db, $query);

            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db);

            $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "You are now logged in";
            header('location: index.php');
        }
    }
}

// return user array from their id
function getUserById($id){
    global $db;
    $query = "SELECT * FROM users WHERE id=" . $id;
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}

// escape string
function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
    global $errors;

    if (count($errors) > 0){
        echo '<div class="error">';
        foreach ($errors as $error){
            echo $error .'<br>';
        }
        echo '</div>';
    }
}

function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    }else{
        return false;
    }
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
    login();
}

// LOGIN USER
function login(){
    global $db, $uname, $errors;

    // grap form values
    $uname = e($_POST['uname']);
    $password = e($_POST['password']);

    // make sure form is filled properly
    if (empty($uname)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM users WHERE uname='$uname' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin') {

                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: admin/admindashboard.php');
            }else{
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";

                header('location: dashboard.php');
            }
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

function isAdmin()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
        return true;
    }else{
        return false;
    }
}
