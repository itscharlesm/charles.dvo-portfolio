<?php
  // Set your email address where you want to receive the messages
  $receiving_email_address = 'itscharlesm@gmail.com';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = strip_tags($_POST['name']);
      $email = strip_tags($_POST['email']);
      $subject = strip_tags($_POST['subject']);
      $message = nl2br(strip_tags($_POST['message']));

      // Email Subject
      $email_subject = "My Portfolio Contact";

      // Email Content (HTML)
      $email_body = "
      <html>
      <head>
        <title>My Portfolio Contact Form</title>
      </head>
      <body>
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong><br> $message</p>
      </body>
      </html>";

      // Headers for email (HTML + UTF-8 support)
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
      $headers .= "From: $email\r\n";
      $headers .= "Reply-To: $email\r\n";

      // Send email
      if (mail($receiving_email_address, $email_subject, $email_body, $headers)) {
          echo "success";
      } else {
          echo "error";
      }
  } else {
      die("Invalid request.");
  }
?>