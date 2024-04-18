<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>АИС Военный округ</title>
</head>

<style>
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
</style>

<body>
    <header>
        <div class="header_links">
            <a href="{{ route('add-soldier') }}" class="header_link">Добавить военнослужащего</a>
            <a href="{{ route('personnel') }}" class="header_link">Список л/с</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer></footer>
</body>

</html>
