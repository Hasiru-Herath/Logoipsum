<?php
header('Content-Type: application/json');

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
$json_file = 'submissions.json';
if (file_exists($json_file)) {
    $existing_data = json_decode(file_get_contents($json_file), true);
} else {
    $existing_data = [];
}

$existing_data[] = $data;
file_put_contents($json_file, json_encode($existing_data, JSON_PRETTY_PRINT));

// Send emails
$admin_email = "admin@example.com";
$user_email = $data['email'];
$subject_user = "Thank You for Your Submission";
$subject_admin = "New Form Submission";

$message_user = "Dear {$data['first_name']},\n\nThank you for reaching out to us! We have received your submission and will get back to you soon.\n\nBest regards,\nLogipsum Team";
$message_admin = "New submission received:\n\n" . print_r($data, true);

$headers = "From: no-reply@logipsum.com\r\n";

mail($user_email, $subject_user, $message_user, $headers);
mail($admin_email, $subject_admin, $message_admin, $headers);

// Send response
echo json_encode(['message' => 'Form submitted successfully']);
?>