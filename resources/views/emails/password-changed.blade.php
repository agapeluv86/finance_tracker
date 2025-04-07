<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Changed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Hello {{ $firstname }} {{ $lastname }},</p>

        <p>Your password has been changed successfully. If you did not make this change, please contact our support team immediately.</p>

        <p>Thank you,<br>
        <strong>My Finance App Team</strong></p>

        <p class="footer">If you have any concerns, please contact us at <a href="mailto:support@myfinanceapp.com">support@myfinanceapp.com</a></p>
    </div>
</body>
</html>
