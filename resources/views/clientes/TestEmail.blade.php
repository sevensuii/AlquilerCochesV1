<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de correo</title>
</head>
<body>
    <h1> {{ $details ['tittle'] }}</h1>
    <p> {{ $details ['body'] }}</p>
    <p> <b>{{auth()->user()->name}}</b> con el correo <b>{{auth()->user()->email}}</b></p>
</body>
</html>