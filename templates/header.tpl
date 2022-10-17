<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Leo imdb</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    {if !isset($smarty.session.USER_ID)}
        <h1>Logueate <span><a href="login">aqui</a></span></h1>
    {else}
        <h1><a href="logout">Logout</a></h1>
    {/if}
</body>