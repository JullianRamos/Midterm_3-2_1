<?php 

session_start();

// Check if submitBtn exists
if (isset($_POST['submitBtn'])) {

    // Get the first name from the form
    $firstName = $_POST['firstName'];
    
    // Check if there's already a logged-in user
    if (isset($_SESSION['firstName']) && $_SESSION['firstName'] !== $firstName) {
        // Set an error message showing who is currently logged in
        $_SESSION['error_message'] = $_SESSION['firstName'] . " is already logged in. Wait for them to logout.";
        // Redirect back to index.php
        header('Location: index.php');
        exit;
    }

    // Get the password from the input field
    $password = md5($_POST['password']);

    // Set the session variables
    $_SESSION['firstName'] = $firstName;
    $_SESSION['password'] = $password;

    // Go back to index.php
    header('Location: index.php');
    exit;
}

?>