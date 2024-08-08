<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <div>
        <h1>Name: {{ $data['name'] }}</h1>

        <br><br>
        <h1>Email: {{ $data['email'] }}</h1>

        <br><br>
        <h4>Message:</h4> <br>

        <p>
            {{ $data['message'] }}
        </p>

    </div>
</body>
</html>