<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input fields
    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = filter_var(trim($_POST["subject"]), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all required fields.";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Email recipient
    $to = "odamephilip966@gmail.com";

    // Email subject
    $emailSubject = "New Contact Form Submission: " . (!empty($subject) ? $subject : "No Subject");

    // Email message
    $emailBody = "You have received a new message from your contact form.\n\n" .
                 "Name: $name\n" .
                 "Email: $email\n\n" .
                 "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Attempt to send the email
    if (mail($to, $emailSubject, $emailBody, $headers)) {
        // Redirect to a success page or display success message
        header("Location: thank-you.html");
        exit;
    } else {
        echo "Failed to send your message. Please try again later.";
    }
} else {
    // Redirect if the request method is not POST
    header("Location: contact.html");
    exit;
}
