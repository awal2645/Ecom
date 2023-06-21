<!DOCTYPE html>
<html>
<head>
    <title>Email Template</title>
    <style>
        /* Styles for the email template */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333333;
        }

        p {
            color: #666666;
            margin-bottom: 20px;
        }

        .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Name: {{ $mailData['name'] }}</h2>
        <h2>Email: {{ $mailData['mail'] }}</h2>
        <p>{{ $mailData['body'] }}</p>
        <a class="cta-button" href="#">Get Started</a>
        <div class="footer">
            <p>Best regards, <br>Our Team</p>
        </div>
    </div>
</body>
</html>
