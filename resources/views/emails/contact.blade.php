<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouveau message de contact - SAAHDEL ONG</title>
</head>
<body>
    <h2>Nouveau message de contact</h2>
    
    <p><strong>De:</strong> {{ $name }} ({{ $email }})</p>
    <p><strong>Sujet:</strong> {{ $subject }}</p>
    
    <div>
        <strong>Message:</strong>
        <p>{{ $messageContent }}</p>
    </div>
    
    <hr>
    <p>Cet email a été envoyé depuis le formulaire de contact du site SAAHDEL ONG.</p>
</body>
</html>