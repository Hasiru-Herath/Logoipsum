<?php
header('Content-Type: application/json');

// Include Composer's autoloader
require 'vendor/autoload.php';

// Validate form data
$required_fields = ['first_name', 'last_name', 'email', 'message', 'terms'];
$errors = [];

foreach ($required_fields as $field) {
    if (empty($_POST[$field]) && $field !== 'terms') {
        $errors[] = "$field is required";
    }
}

if (!isset($_POST['terms'])) {
    $errors[] = "You must agree to the terms";
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['errors' => $errors]);
    exit;
}

// Sanitize input
$data = [
    'first_name' => htmlspecialchars($_POST['first_name']),
    'last_name' => htmlspecialchars($_POST['last_name']),
    'email' => htmlspecialchars($_POST['email']),
    'phone' => htmlspecialchars($_POST['phone'] ?? ''),
    'message' => htmlspecialchars($_POST['message']),
    'submitted_at' => date('Y-m-d H:i:s')
];

// Save to JSON file
$json_file = 'data/submissions.json';
if (file_exists($json_file)) {
    $existing_data = json_decode(file_get_contents($json_file), true);
} else {
    $existing_data = [];
}

$existing_data[] = $data;
file_put_contents($json_file, json_encode($existing_data, JSON_PRETTY_PRINT));

// Send emails using PHPMailer
require 'E:/Logoipsum/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'E:/Logoipsum/vendor/phpmailer/phpmailer/src/Exception.php';
require 'E:/Logoipsum/vendor/phpmailer/phpmailer/src/SMTP.php';



$mail = new \PHPMailer\PHPMailer\PHPMailer(true);

try {
    // Admin email
    $admin_email = "dumidu.kodithuwakku@ebeyonds.com";
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hasiruherath.13@gmail.com'; 
    $mail->Password = ''; 
    $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('no-reply@logipsum.com', 'Logipsum');
    $mail->addAddress($admin_email);
    $mail->Subject = "New Form Submission - Logipsum";
    $mail->Body = "A new form submission has been received on " . $data['submitted_at'] . ":\n\n" .
                  "First Name: {$data['first_name']}\n" .
                  "Last Name: {$data['last_name']}\n" .
                  "Email: {$data['email']}\n" .
                  "Phone: " . ($data['phone'] ?: 'Not provided') . "\n" .
                  "Message: {$data['message']}\n\n" .
                  "Please follow up with the user as needed.";
    $mail->send();

    $mail->clearAddresses();
    $mail->addAddress($data['email']);
    $mail->Subject = "Thank You for Your Submission - Logipsum";
    $mail->Body = "Dear {$data['first_name']} {$data['last_name']},\n\n" .
                  "Thank you for reaching out to us at Logipsum! We have successfully received your submission.\n\n" .
                  "Here are the details we received:\n" .
                  "First Name: {$data['first_name']}\n" .
                  "Last Name: {$data['last_name']}\n" .
                  "Email: {$data['email']}\n" .
                  "Phone: " . ($data['phone'] ?: 'Not provided') . "\n" .
                  "Message: {$data['message']}\n\n" .
                  "We will review your message and get back to you as soon as possible.\n\n" .
                  "Best regards,\nThe Logipsum Team";
    $mail->send();
} catch (Exception $e) {
    file_put_contents('email_error.log', "Email sending failed: " . $e->getMessage());
}

echo json_encode(['message' => 'Form submitted successfully']);
?>