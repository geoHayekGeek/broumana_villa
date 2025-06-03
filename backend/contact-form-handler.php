<?php
header("Content-Type: application/json");
require_once "db.php";

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/phpmailer/src/SMTP.php';
require_once __DIR__ . '/phpmailer/src/Exception.php';

$data = json_decode(file_get_contents("php://input"), true);

$recaptchaToken = $data['recaptchaToken'] ?? '';

if (!$recaptchaToken) {
    http_response_code(400);
    echo json_encode(["message" => "reCAPTCHA verification failed."]);
    exit;
}

// Verify CAPTCHA with Google
$recaptchaSecret = "6Ldb5lQrAAAAAOclJaCH2wb17X-mLds4_eOYcFMK";
$recaptchaVerifyUrl = "https://www.google.com/recaptcha/api/siteverify";

$response = file_get_contents($recaptchaVerifyUrl . "?secret=" . urlencode($recaptchaSecret) . "&response=" . urlencode($recaptchaToken));
$responseData = json_decode($response);

if (!$responseData->success) {
    http_response_code(400);
    echo json_encode(["message" => "reCAPTCHA verification failed."]);
    exit;
}

// Validate input
$firstName = trim($data['firstName'] ?? '');
$lastName = trim($data['lastName'] ?? '');
$email = trim($data['email'] ?? '');
$phone = trim($data['phone'] ?? '');
$message = trim($data['message'] ?? '');

if (!$firstName || !$lastName || !$email || !$message) {
    http_response_code(400);
    echo json_encode(["message" => "Please fill in all required fields."]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["message" => "Invalid email address."]);
    exit;
}

// Insert into database
$stmt = $conn->prepare("INSERT INTO contact_messages (first_name, last_name, email, phone, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstName, $lastName, $email, $phone, $message);

if ($stmt->execute()) {
    // Send email using PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'georgiohayek2002@gmail.com';       // 🔁 Replace with your Gmail
        $mail->Password   = 'fvqf nveq hmdk jblh';          // 🔁 Replace with Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('georgiohayek2002@gmail.com', 'Broumana Villa Website');  // 🔁 Replace
        $mail->addAddress('georgiohayek2002@gmail.com');

        $mail->isHTML(false);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "You have a new message:\n\n"
                        . "Name: $firstName $lastName\n"
                        . "Email: $email\n"
                        . "Phone: $phone\n"
                        . "Message:\n$message";

        $mail->send();
        echo json_encode(["message" => "Thank you for contacting us!"]);
    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
        echo json_encode(["message" => "Message saved, but email could not be sent."]);
    }
} else {
    http_response_code(500);
    echo json_encode(["message" => "Something went wrong. Please try again later."]);
}
?>
