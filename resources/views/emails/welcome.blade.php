<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EEE Portal | Register</title>
</head>
<body>

    <h2>Confirm your account</h2>
    <p>
        <strong>Name:</strong> {{$request->input('name')}}
    </p>
    <p>
        <strong>Email:</strong> {{$request->input('email')}}
    </p>
    <p>
        <strong>Level</strong> {{$request->input('level_id')}}
    </p>

    <p>Click below to confirm</p>
</body>
</html>
