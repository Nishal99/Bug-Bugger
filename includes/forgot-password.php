<?php
session_start();
require_once 'includes/dbh.inc.php'; // Include database connection

if (isset($_POST["submit"])) {
  $email = $_POST["email"];

  // Check if email exists
  $sql = "SELECT * FROM users WHERE usersEmail = ?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "Connection error!";
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    // Generate a random password reset token
    $token = bin2hex(random_bytes(16));

    // Set expiration time (replace with your desired time)
    $expire = date("Y-m-d H:i:s", strtotime('+1 hour'));

    // Update user record with token and expiration
    $sql = "UPDATE users SET pwdResetToken = ?, pwdResetExpire = ? WHERE usersEmail = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo "Connection error!";
      exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $token, $expire, $email);
    mysqli_stmt_execute($stmt);

    // Send reset password email
    $to = $email;
    $subject = "Reset Your Password for [Your Website Name]";
    $message = "Hi " . $row["usersName"] . ",\n\n";
    $message .= "You recently requested to reset your password for your account on [Your Website Name].\n\n";
    $message .= "Click the link below to set a new password:\n\n";
    $message .= "https://support.similarweb.com/hc/en-us/articles/207698339-How-do-I-reset-my-passwordreset-password.php?token=" .}}