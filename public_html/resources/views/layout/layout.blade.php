<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>АИС Военный округ</title>
</head>

<style>
    header {
        background-color: blanchedalmond;
    }

    body {
        background-color: #33333315;
    }

    body,
    h1 {
        margin: 0;
    }

    .first_level {
        display: flex;
        justify-content: space-around;
        align-items: center;

        max-width: 1200px;
        width: 100%;

        margin: 0 auto;
        padding-top: 2%;
    }

    .first_level h1 {
        padding-right: 20%;
        text-align: center;
    }

    .header_links {
        display: flex;
        justify-content: space-evenly;

        max-width: 800px;
        width: 100%;
        margin: 30px auto 30px;
    }

    .header_link {
        font-size: 20px;
        /* color: black; */
    }

    .logo{
        width: 150px;
    }

    .logo img{
        width: 100%;
    }
</style>

<body>
    <header>
        <div class="first_level">
            <a class="logo" href="{{ route('index') }}">
                <img src="{{ asset('img/min_oboroni_logo.png') }}" alt="logo">
            </a>
            <h1>Информационная система военного округа</h1>
        </div>
        <div class="second_level header_links">

        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer></footer>
</body>

</html>
