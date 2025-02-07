<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting form data
    $firstName = htmlspecialchars(trim($_POST['FName']));
    $lastName = htmlspecialchars(trim($_POST['LName']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['textbox']));

    // Basic validation
    if (empty($firstName) || empty($lastName) || empty($email) || empty($message)) {
        echo "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
    } else {
        // Email setup
        $to = "atolagbegloria@gmail.com"; // Replace with your email address
        $subject = "New Contact Form Submission from $firstName $lastName";
        $body = "
        You have received a new message from your website contact form:

        Name: $firstName $lastName
        Email: $email
        Message:
        $message
        ";
        $headers = "From: $email\r\n";
        $headers = "Reply-To: $email\r\n";

        // Sending the email
        if (mail($to, $subject, $body, $headers)) {
            echo "<h3>Thank you, $firstName, for reaching out! Your message has been sent successfully.</h3>";
        } else {
            echo "<h3>Sorry, something went wrong. Please try again later.</h3>";
        }
    }
}
?>
