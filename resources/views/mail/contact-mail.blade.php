<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Contatto da CineBlog</title>
</head>
<body>
    <h2>Hai ricevuto un nuovo messaggio da CineBlog</h2>

    <p><strong>Nome:</strong> {{ $user_contact['user'] }}</p>
    <p><strong>Email:</strong> {{ $user_contact['email'] }}</p>
    <p><strong>Messaggio:</strong></p>
    <p>{{ $user_contact['message'] }}</p>

    <hr>
    <p>Grazie per averci contattato.</p>
</body>
</html>
