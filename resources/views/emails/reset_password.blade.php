<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body>
    <p>Dear user,</p>
    
    <p>You have requested to reset your password. Click the link below to reset your password:</p>
    
    <a href="{{ $resetLink }}">{{ $resetLink }}</a>
    
    <p>If you did not request a password reset, please ignore this email.</p>
    
    <p>Thank you,</p>
    <p>Your Application Team</p>
</body>
</html>
