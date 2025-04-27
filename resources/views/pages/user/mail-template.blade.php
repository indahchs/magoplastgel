<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Mail</title>
    <style>
        /* Basic styles to ensure proper rendering */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .email-header {
            background-color: #0f4229;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .email-body {
            padding: 20px;
            color: #333333;
        }

        .email-body h4 {
            margin-bottom: 5px;
            font-size: 18px;
            color: #0f4229;
        }

        .email-body p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .email-footer {
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #888888;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0f4229;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        @media (max-width: 600px) {
            .email-container {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <table role="presentation" class="email-container">
        <!-- Email Header -->
        <tr>
            <td class="email-header">
                <h1>New Contact Request</h1>
            </td>
        </tr>

        <!-- Email Body -->
        <tr>
            <td class="email-body">
                <h4>Subject:</h4>
                <p>{{ $subject }}</p>

                <h4>Name:</h4>
                <p>{{ $name }}</p>

                <h4>Phone:</h4>
                <p>{{ $phone }}</p>

                <h4>Email:</h4>
                <p>{{ $email }}</p>

                <h4>Services Requested:</h4>
                <p>{{ $services }}</p>

                <h4>Message:</h4>
                <p>{{ $messageBody }}</p>

                <p>To respond, you can contact this customer directly by clicking the button below.</p>
                <a href="mailto:{{ $email }}" class="btn">Reply to {{ $name }}</a>
            </td>
        </tr>

        <!-- Email Footer -->
        <tr>
            <td class="email-footer">
                <p>&copy; {{ date('Y') }} Maggoplastgel. All rights reserved.</p>
            </td>
        </tr>
    </table>
</body>
</html>
