<!DOCTYPE html>
<html>

<head>
    <!-- Include Bootstrap 5.3 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-4 text-center">
            <img
            src="images/frenchnow_logo_font_01.svg"
            class="mb-5"
            alt="Your Logo"
            style="width: 300px; height: auto"/>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = $_POST['name'];
                    $email = filter_var($_POST['_replyto'], FILTER_SANITIZE_EMAIL);
                    $message = $_POST['message'];

                    if (empty($name) || empty($email) || empty($message)) {
                        echo '<div class="alert alert-danger" role="alert">All fields are required. Please fill out the form completely.</div>';
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo '<div class="alert alert-danger" role="alert">Invalid email address. Please enter a valid email.</div>';
                    } else {
                        $to = 'gaudenz.raiber@gmail.com'; // Your email address
                        $subject = 'Frenchnow-Kontakt-Formular';
                        $message = "Name: $name\nEmail: $email\nMessage:\n$message";
                        $headers = 'From: ' . $email;

                        if (mail($to, $subject, $message, $headers)) {
                            echo '<div class="alert alert-info" role="alert">Vielen Dank. Wir melden uns in Kürze.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Message delivery failed. Please try again later.</div>';
                        }
                    }
                }
                ?>

                <div class="row justify-content-center">
                    <div class="col-4 text-center">
                        <a id="backButton" class="btn btn-primary">Zurück</a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <img src="images/zap-bestehen-qr.png" class="img-fluid mt-3" alt="qr-code">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.getElementById("backButton").addEventListener("click", function() {
            // Get the URL of the referring page
            var referringPage = document.referrer;

            // Redirect to the referring page
            window.location.href = referringPage;
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>