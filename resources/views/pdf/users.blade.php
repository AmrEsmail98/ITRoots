<html lang="eng">

<head>
    <meta charset="UTF-8">
    <title> Users Pdf </title>
</head>

<body>
    @foreach ($data as $key => $user)
        <h2>Full Name:{{ $user->fullname }}</h2>
        <p> User Name: {{ $user->username }}</p>
        <p> Email: {{ $user->email }}</p>
        <p> phone: {{ $user->phone }}</p>

    @endforeach
</body>
</html>
