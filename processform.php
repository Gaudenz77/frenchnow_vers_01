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
                /* if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = $_POST['name'];
                    $email = filter_var($_POST['_replyto'], FILTER_SANITIZE_EMAIL);
                    $message = $_POST['message'];

                    if (empty($name) || empty($email) || empty($message)) {
                        echo '<div class="alert alert-danger" role="alert">All fields are required. Please fill out the form completely.</div>';
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo '<div class="alert alert-danger" role="alert">Invalid email address. Please enter a valid email.</div>';
                    } else {
                        $to = 'gaudenz.raiber@gmail.com'; 
                        $subject = 'Frenchnow-Kontakt-Formular';
                        $message = "Name: $name\nEmail: $email\nMessage:\n$message";
                        $headers = 'From: ' . $email;

                        if (mail($to, $subject, $message, $headers)) {
                            echo '<div class="alert alert-info" role="alert">Vielen Dank. Wir melden uns in Kürze.</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Message delivery failed. Please try again later.</div>';
                        }
                    }
                } */
                ?>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = $_POST['name'];
                    $email = filter_var($_POST['_replyto'], FILTER_SANITIZE_EMAIL);
                    $message = $_POST['message'];
                    $language = $_POST['language'];

                    if (empty($name) || empty($email) || empty($message)) {
                        echo '<div class="alert alert-danger" role="alert">' . getErrorMessage($language) . '</div>';
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo '<div class="alert alert-danger" role="alert">' . getEmailErrorMessage($language) . '</div>';
                    } else {
                        $to = 'alex.descamps@outlook.com'; // Your email address
                        $subject = 'Frenchnow-Kontakt-Formular';
                        $message = "Name: $name\nEmail: $email\nMessage:\n$message";
                        $headers = 'From: ' . $email;

                        if (mail($to, $subject, $message, $headers)) {
                            echo '<div class="alert alert-info" role="alert">' . getSuccessMessage($language) . '</div>';
                        } else {
                            echo '<div class="alert alert-danger" role="alert">' . getFailureMessage($language) . '</div>';
                        }
                    }
                }

                function getErrorMessage($language) {
                    // Implement logic to return the appropriate error message for the language
                    // Default to German if the language is not specified or not supported
                    switch ($language) {
                        case 'french':
                            return 'Erreur: Tous les champs sont obligatoires. Veuillez remplir le formulaire complètement.';
                        case 'russian':
                            return 'Ошибка: Все поля обязательны к заполнению. Пожалуйста, заполните форму полностью.';
                        default:
                            return 'Fehler: Alle Felder sind erforderlich. Bitte füllen Sie das Formular vollständig aus.';
                    }
                }

                function getEmailErrorMessage($language) {
                    // Implement logic to return the appropriate email error message for the language
                    // Default to German if the language is not specified or not supported
                    switch ($language) {
                        case 'french':
                            return 'Erreur: Adresse e-mail invalide. Veuillez saisir une adresse e-mail valide.';
                        case 'russian':
                            return 'Ошибка: Неверный адрес электронной почты. Пожалуйста, введите действительный адрес электронной почты.';
                        default:
                            return 'Fehler: Ungültige E-Mail-Adresse. Bitte geben Sie eine gültige E-Mail-Adresse ein.';
                    }
                }

                function getSuccessMessage($language) {
                    // Implement logic to return the appropriate success message for the language
                    // Default to German if the language is not specified or not supported
                    switch ($language) {
                        case 'french':
                            return 'Merci. Nous vous répondrons sous peu.';
                        case 'russian':
                            return 'Большое спасибо. Мы скоро к тебе вернемся.';
                        default:
                            return 'Vielen Dank. Wir melden uns in Kürze.';
                    }
                }

                function getFailureMessage($language) {
                    // Implement logic to return the appropriate failure message for the language
                    // Default to German if the language is not specified or not supported
                    switch ($language) {
                        case 'french':
                            return 'Échec de la livraison du message. Veuillez réessayer plus tard.';
                        case 'russian':
                            return 'Ошибка доставки сообщения. Пожалуйста, попробуйте позже.';
                        default:
                            return 'Message delivery failed. Please try again later.';
                    }
                }
                ?>

                <div class="row justify-content-center">
                    <div class="col-4 text-center">
                    <a id="backButton" class="btn btn-primary" data-language="<?php echo $language; ?>">Zurück</a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- <div class="col-6">
                        <img src="images/zap-bestehen-qr.png" class="img-fluid mt-3" alt="qr-code">
                    </div> -->
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

        // Change Button Label according to Languages Selected

        document.addEventListener("DOMContentLoaded", function () {
        // Retrieve the language from the data attribute
        var language = document.getElementById("backButton").getAttribute("data-language");

        // Set the button label based on the language
        switch (language) {
            case 'french':
                document.getElementById("backButton").innerText = 'Retour';
                break;
            case 'russian':
                document.getElementById("backButton").innerText = 'Назад';
                break;
            // Add more cases if needed for other languages
        }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>