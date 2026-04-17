<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject ?? 'Email Notification' }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; color: #333; margin: 0; padding: 20px;">
    <div style="background-color: #fff; border: 1px solid #ddd; border-radius: 5px; padding: 20px; max-width: 600px; margin: auto; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #007bff; font-size: 24px; margin-top: 0;">{{ $subject ?? 'No Subject' }}</h2>
        <p style="font-size: 16px; line-height: 1.5; margin: 15px 0;">{{ $body ?? 'No content provided.' }}</p>
    <p>Regards,</p>
    <p>Veuxy Team</p>
    </div>
    
</body>
</html>
