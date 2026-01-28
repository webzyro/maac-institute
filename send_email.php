<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $botField = trim($_POST['customer_code'] ?? '');
    if (!empty($botField)) {
        // Spam detected
        die('Spam detected. Submission blocked.');
    }
    // Validate and sanitize input
    $fname = htmlspecialchars(trim($_POST['f_name'] ?? ''));
    $lname = filter_var(trim($_POST['l_name'] ?? ''), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $intrested = htmlspecialchars(trim($_POST['intrested'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (!empty($fname) && !empty($phone) && !empty($intrested)) {
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Corrected Host
            $mail->SMTPAuth = true;
            $mail->Username = 'kankarbaghmaac@gmail.com';
            $mail->Password = 'lscu heiu deij akxo';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('kankarbaghmaac@gmail.com', 'Contact_Form');
            $mail->addAddress('kankarbaghmaac@gmail.com', 'Advante_Clinic');

            // Content
            $mail->isHTML(true);
            $mail->Subject = "New $formType Submission";
            $mail->Body = '
        <div style="max-width: 600px; margin: 0 auto; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden; font-family: Arial, sans-serif;">
            <div style="background-color: #28a745; color: #fff; text-align: center; padding: 20px;">
                <h2 style="margin: 0;">New Contact Form Submission</h2>
            </div>
            <div style="padding: 20px; background-color: #f9f9f9;">
                <h3 style="color: #333;">Contact Details</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr style="background-color: #f1f1f1;">
                        <td style="padding: 10px; border: 1px solid #e0e0e0;"><strong>First Name:</strong></td>
                        <td style="padding: 10px; border: 1px solid #e0e0e0;">' . htmlspecialchars($fname) . '</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e0e0e0;"><strong>Last Name:</strong></td>
                        <td style="padding: 10px; border: 1px solid #e0e0e0;">' . htmlspecialchars($lname) . '</td>
                    </tr>
                    <tr style="background-color: #f1f1f1;">
                        <td style="padding: 10px; border: 1px solid #e0e0e0;"><strong>Phone:</strong></td>
                        <td style="padding: 10px; border: 1px solid #e0e0e0;">' . htmlspecialchars($phone) . '</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #e0e0e0;"><strong>Email:</strong></td>
                        <td style="padding: 10px; border: 1px solid #e0e0e0;">' . htmlspecialchars($email) . '</td>
                    </tr>
                    <tr style="background-color: #f1f1f1;">
                        <td style="padding: 10px; border: 1px solid #e0e0e0;"><strong>Intrested:</strong></td>
                        <td style="padding: 10px; border: 1px solid #e0e0e0;">' . htmlspecialchars($intrested) . '</td>
                    </tr>
                    <tr style="background-color: #f1f1f1;">
                        <td style="padding: 10px; border: 1px solid #e0e0e0;"><strong>Message:</strong></td>
                        <td style="padding: 10px; border: 1px solid #e0e0e0;">' . nl2br(htmlspecialchars($message)) . '</td>
                    </tr>
                </table>
                <p style="margin-top: 20px; text-align: center;">
                    <a href="#" style="background-color: #28a745; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Visit Our Website</a>
                </p>
            </div>
            <div style="background-color: #28a745; color: #fff; text-align: center; padding: 10px;">
                <p style="margin: 0;">Thank you for getting in touch!</p>
            </div>
        </div>';

            $mail->send();
            // Redirect to thank.php after successful submission
            header("Location: thank-you.php?name=" . urlencode($name));
            exit();
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
        }
    } else {
        echo '<script>alert("Please fill in all required fields!")</script>';
    }
} else {
    echo '<script>alert("Invalid request method!")</script>';
}
