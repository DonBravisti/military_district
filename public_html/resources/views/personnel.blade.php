@extends('layout.layout')
@section('content')
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;

            width: fit-content;
            margin: 0 auto;
        }

        table {
            border-spacing: 20px 7px;
        }

        th,
        td {
            text-align: center;
        }

        .plan__controls {
            display: flex;
            align-items: center;
        }
    </style>

    <section>
        <div class="container">
            <h1>Список личного состава</h1>

            <form action="{{ route('search') }}" method="GET">
                <label for="rank_search"> Поиск по званию</label>
                <input type="text" id="rank_search" name="rank_search" placeholder="Введите звание" required>
                <button type="submit">Поиск</button>
            </form>

            <form action="{{ route('filterPersonnel') }}" method="POST">
                @csrf
                <div class="filter_field">
                    <label for="army">Армия</label>
                    <select name="army" id="army">
                        <option value="0">Не выбрано</option>
                        @foreach ($armies as $army)
                            <option value="{{ $army->id }}">{{ $army->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="filter_field">
                    <label for="corpus">Корпус</label>
                    <select name="corpus" id="corpus">
                        <option value="0">Не выбрано</option>
                        @foreach ($corpuses as $corpus)
                            <option value="{{ $corpus->id }}">{{ $corpus->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="filter_field">
                    <label for="division">Дивизия</label>
                    <select name="division" id="division">
                        <option value="0">Не выбрано</option>
                        @foreach ($divisions as $division)
                            <option value="{{ $division->id }}">{{ $division->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="filter_field">
                    <label for="base">Военная часть</label>
                    <select name="base" id="base">
                        <option value="0">Не выбрано</option>
                        @foreach ($bases as $base)
                            <option value="{{ $base->id }}">{{ $base->title }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit">Применить</button>
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
                            <td>{{ $soldier->FIO }}</td>
                            <td>{{ $soldier->rank->title }}</td>
                            <td>{{ $soldier->speciality->title }}</td>
                            <td class="plan__controls">
                                <form method="GET" action="{{ route('personnel.update-form', ['id' => $soldier->id]) }}">
                                    @csrf
                                    <button type="submit">
                                        Редактировать
                                    </button>
                                </form>
                                /
                                <form method="POST" action="{{ route('personnel.remove', ['id' => $soldier->id]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" onclick="return ConfirmDelete()">
                                        Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <script>
        document.getElementById('army').addEventListener('change', function() {
            fetch(`/api/corpuses?army_id=${this.value}`)
                .then(response => response.json())
                .then(data => {
                    let corpusSelect = document.getElementById('corpus');
                    corpusSelect.innerHTML = '<option value="0">Не выбрано</option>';
                    data.corpuses.forEach(corpus => {
                        corpusSelect.innerHTML +=
                            `<option value="${corpus.id}">${corpus.title}</option>`;
                    });
                });
        });

        document.getElementById('corpus').addEventListener('change', function() {
            fetch(`/api/divisions?corpus_id=${this.value}`)
                .then(response => response.json())
                .then(data => {
                    let divisionSelect = document.getElementById('division');
                    divisionSelect.innerHTML = '<option value="0">Не выбрано</option>';
                    data.divisions.forEach(division => {
                        divisionSelect.innerHTML +=
                            `<option value="${division.id}">${division.title}</option>`;
                    });
                });
        });

        document.getElementById('division').addEventListener('change', function() {
            fetch(`/api/bases?division_id=${this.value}`)
                .then(response => response.json())
                .then(data => {
                    let baseSelect = document.getElementById('base');
                    baseSelect.innerHTML = '<option value="0">Не выбрано</option>';
                    data.bases.forEach(base => {
                        baseSelect.innerHTML += `<option value="${base.id}">${base.title}</option>`;
                    });
                });
        });

        function ConfirmDelete() {
            return confirm('Вы уверены, что хотите удалить эту запись?');
        }
    </script>
@endsection
