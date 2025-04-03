<!DOCTYPE html>
<html>
<head>
    <title>Contact Us Query</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            line-height: 1.6;
            color: #333333;
        }
        .content p {
            margin: 10px 0;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #666666;
            margin-top: 20px;
            padding: 10px;
            border-top: 1px solid #dddddd;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .highlight {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            New Contact Us Message
        </div>
        <div class="content">
            <p><strong>Name:</strong> <span class="highlight">{{ $contactData['name'] }}</span></p>
            <p><strong>Email:</strong> <a href="mailto:{{ $contactData['email'] }}">{{ $contactData['email'] }}</a></p>
            <p><strong>Message:</strong></p>
            <p style="background: #f9f9f9; padding: 10px; border-left: 4px solid #007bff;">
                {{ $contactData['message'] }}
            </p>
        </div>
        <div class="footer">
            <p>Need to reply? Click <a href="mailto:{{ $contactData['email'] }}">here</a> to respond.</p>
            <p>&copy; {{ date('Y') }} LA Bonita LTD. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
