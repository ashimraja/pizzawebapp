<?php
include("../admin/includes/config.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    // Prepare and bind the SQL statement
    $stmt = $db_conn->prepare("SELECT COUNT(*) FROM users WHERE email=? AND password=? AND u_post='admin'");
    $stmt->bind_param("ss", $email, $pass);

    // Execute the statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($count);

    // Fetch result
    $stmt->fetch();

    // Close statement
    $stmt->close();

    if ($count > 0) {
        // Valid credentials, start session and redirect to dashboard
        session_start();
        $_SESSION['login'] = true;
        header('Location: ../admin/dashboard.php');
        exit(); // Make sure to stop script execution after redirection
    } else {
        // Invalid credentials
        echo 'Invalid Credentials';
    }
}
?>
