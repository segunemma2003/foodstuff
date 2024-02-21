<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body>
    <h2>Contact Form Submission</h2>
    <p><strong>Name:</strong> {{ $emailData['name'] }}</p>
    <p><strong>Email:</strong> {{ $emailData['email'] }}</p>
    <p><strong>Company:</strong> {{ $emailData['company'] }}</p>
    <p><strong>Phone:</strong> {{ $emailData['phone'] }}</p>
    <p><strong>Department:</strong> {{ $emailData['department'] }}</p>
    <p><strong>Subject:</strong> {{ $emailData['subject'] }}</p>
    <p><strong>Message:</strong> {{ $emailData['message'] }}</p>
</body>
</html>
