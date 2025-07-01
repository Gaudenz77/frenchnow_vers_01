<?php
// Set your receiving email here
$to = "swissperspective@gmail.com";
$subject = "Neue Newsletter-Anmeldung";

// Only process POST requests
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate email
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Ungültige E-Mail-Adresse.";
        exit;
    }

    // Optional: check if checkbox was checked
    if (!isset($_POST["consent"])) {
        http_response_code(400);
        echo "Bitte stimmen Sie dem Erhalt des Newsletters zu.";
        exit;
    }

    // Email content
    $message = "Neue Newsletter-Anmeldung:\n\nE-Mail: $email";

    // Email headers
    $headers = "From: Newsletter <noreply@frenchnow.com>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Try to send
    if (mail($to, $subject, $message, $headers)) {
        echo "Vielen Dank für Ihre Anmeldung!";
    } else {
        http_response_code(500);
        echo "Fehler beim Senden der Nachricht.";
    }
} else {
    http_response_code(403);
    echo "Ungültige Anfrage.";
}
?>
