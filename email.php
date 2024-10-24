<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Include PHPMailer classes
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendMail($email, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'dulaclarence6@gmail.com';  
        $mail->Password = 'ffsg ghbj pqbl skaj';        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender and recipient settings
        $mail->setFrom('dulaclarence6@gmail.com', 'Clarence Dula');
        $mail->addAddress($email);  // Recipient email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = strip_tags($message);

        $mail->send();
        return "success";
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>



<?php
// Ensure you include the file that defines sendMail


// Check if the form is submitted
if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
        $response = "All fields are required";
    } else {
        // Call sendMail function and pass the form data
        $response = sendMail($_POST['email'], $_POST['subject'], $_POST['message']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        nav {
            width: 100%;
            margin-bottom: 20px;
        }

        nav ul {
            list-style-type: none;
            display: flex;
            justify-content: center;
            padding: 10px;
            background-color: #007bff;
            border-radius: 8px;
        }

        nav li {
            margin: 0 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 700;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #0056b3; /* Darker shade for hover effect */
        }

        .email-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 100%;
            max-width: 600px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-header h2 {
            color: #333;
            font-size: 2em;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-submit {
            background: linear-gradient(90deg, #56ab2f 0%, #a8e063 100%);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
        }

        .btn-submit:hover {
            background-color: #4caf50;
            transform: scale(1.05);
        }

        @media (max-width: 600px) {
            .email-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<nav>
    <ul>
        <li><a href="admin.php">Home</a></li>
        
        <li><a href="Email.php">Email Notification</a></li>

        <li><a href="login.php">Logout</a></li>
    </ul>
</nav>

<div class="email-container">
    <div class="form-header">
        <h2>Send Email Notification</h2>
    </div>

    <form action="" method="post">
        <div class="form-group">
            <label for="email">Recipient Email:</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter recipient email" required>
        </div>

        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter email subject" required>
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
        </div>

        <div class="form-group text-center">
            <button type="submit" name="submit" class="btn-submit">Send Email</button>
        </div>

        <?php if (isset($response)) : ?>
            <p class="<?= $response == 'success' ? 'text-success' : 'text-danger'; ?>">
                <?= $response == 'success' ? 'Email sent successfully.' : $response; ?>
            </p>
        <?php endif; ?>
    </form>
</div>

</body>
</html>
