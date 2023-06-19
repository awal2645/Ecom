<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <h2>Name:{{ $mailData['name'] }}</h2>
    <h2>{{ $mailData['mail'] }}</h2>
  
    <p>{{ $mailData['body'] }}</p>
    <p>Thank you</p>
</body>
</html>