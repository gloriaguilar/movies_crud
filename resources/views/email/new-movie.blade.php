<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Movie has been created</title>
</head>

<body>
    <h1>¡Congratulations!</h1>
    <h2>You've created a new movie</h2>
    <h2>Here are the details of your new movie:</h2>
    <h3>Name: <strong>{{ $mailData['title'] }}</strong> </h3>
    <h3>Description: <strong>{{ $mailData['description'] }}</strong> </h3>
    <h3>Url image: <strong>{{ $mailData['url_image'] }}</strong> </h3>
    <h3>Category: <strong>{{ $mailData['category']['title'] }}</strong> </h3>
    <h3>Platform where you can watch: <strong>{{ $mailData['platform']['title'] }}</strong> </h3>
</body>

</html>
