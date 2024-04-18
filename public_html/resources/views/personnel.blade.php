@extends('layout.layout')
@section('content')
    <style>
        .container{
            display: flex;
            flex-direction: column;
            align-items: center;

            width: fit-content;
            margin: 0 auto;
        }

        table{
            border-spacing: 20px 7px;
        }

        th, td{
            text-align: center;
        }
    </style>

    <section>
        <div class="container">
            <h1>Список личного состава</h1>

            <form action="{{ route('search') }}" method="GET">
                <label for="rank_search"> Поиск по званию</label>
                <input type="text" id="rank_search" name="rank_search" placeholder="Введите имя" required>
                <button type="submit">Поиск</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>ФИО</th>
                        <th>Звание</th>
                        <th>Специальность</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personnel as $soldier)
                        <tr>
                            <td>{{ $soldier->FIO() }}</td>
                            <td>{{ $soldier->rank->title }}</td>
                            <td>{{ $soldier->speciality->title }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
