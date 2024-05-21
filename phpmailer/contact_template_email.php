<?php

try {

    // Email verification, do not edit
    function isEmail($email_contact) {
        return(preg_match("/^[_a-z0-9-]+(\.[_a_z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/", $email_contact));
    }

    // Form fields
    $name_contact = $_POST['name_contact'];
    $lastname_contact = $_POST['lastname_contact'];
    $email_contact = $_POST['email_contact'];
    $phone_contact = $_POST['phone_contact'];
    $message_contact = $_POST['message_contact'];
    $verify_contact = $_POST['verify_contact']; // Honeypot field

    // Basic validation
    if (trim($name_contact) == '') {
        echo '<div class="error_message">You must enter your Name.</div>';
        exit();
    } else if (trim($lastname_contact) == '') {
        echo '<div class="error_message">Please enter your Last Name.</div>';
        exit();
    } else if (trim($email_contact) == '') {
        echo '<div class="error_message">Please enter a valid email address.</div>';
        exit();
    } else if (trim($email_contact) == '') {
        echo '<div class="error_message">You have entered an invalid e-mail address.</div>';
        exit();
    } else if (trim($phone_contact) == '') {
        echo '<div class="error_message">Please enter a valid phone number.</div>';
        exit();
    } else if (!is_numeric($phone_contact)) {
        echo '<div class="error_message">Phone number can only contain numbers.</div>';
        exit();
    } else if (trim($message_contact) == '') {
        echo '<div class="error_message">Please enter your message.</div>';
        exit();
    } else if (trim($verify_contact) != '') {
        exit();
    }

    // Set up email variables
    $to = 'aganto1@libero.it'; // Replace with the actual recipient email
    $subject = 'SITO l\'Olivara - ';
    $headers = "From: $name_contact $lastname_contact <$email_contact>\r\n";
    $headers .= "Reply-To: $email_contact\r\n";
    $message = "Name: $name_contact $lastname_contact\n";
    $message .= "Phone: $phone_contact\n";
    $message .= "Message:\n$message_contact\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        // Success message
        echo '<div id="success_page">
                <div class="icon icon--order-success svg">
                     <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                      <g fill="none" stroke="#8EC343" stroke-width="2">
                         <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                         <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                      </g>
                     </svg>
                 </div>
                <h5>Thank you!<span>Request successfully sent!</span></h5>
            </div>';
    } else {
        echo '<div class="error_message">Message could not be sent. Please try again later.</div>';
    }

} catch (Exception $e) {
    echo "<div class='error_message'>An error occurred: {$e->getMessage()}</div>";
}

?>
