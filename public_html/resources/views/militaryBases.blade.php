@extends('layout.layout')
@section('content')
    <style>
        .main_menu {
            width: 100%;
        }

        .menu_items {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;

            max-width: 1000px;
            width: 100%;
            margin: 0 auto;
        }

        .menu_item {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 300px;
            height: 100px;
            border-radius: 7px;
            margin: 10px 0;

            background-color: rgba(171, 170, 170, 0.677);
            color: black;

            text-decoration: none;
            font-size: 18px;

            transition: 500ms;
        }

        .menu_item:hover {
            background-color: rgb(198, 182, 182);
            font-size: 19px;
        }

        .menu_item div {
            width: fit-content;
        }

        p {
            text-align: center;
        }

        span {
            font-size: 14px;
            color: rgb(82, 82, 82);
        }

        .filters {
            max-width: 1000px;
            width: 100%;
            margin: 0 auto;
        }

        .filters form {
            display: flex;
            justify-content: space-between;
        }
    </style>

    <section class="main_menu">
        <div class="filters">
            <form action="{{ route('filter') }}" method="POST">
                @csrf
                <div class="filter_field">
                    <label for="">Армия</label>
                    <select name="army" id="army" disabled>
                        <option value="0">Не выбрано</option>
                        @foreach ($armies as $army)
                            <option value="{{ $army->id }}">{{ $army->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="filter_field">
                    <label for="">Корпус</label>
                    <select name="corpus" id="corpus" disabled>
                        <option value="0">Не выбрано</option>
                        @foreach ($corpuses as $corpus)
                            <option value="{{ $corpus->id }}">{{ $corpus->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="filter_field">
                    <label for="">Дивизия</label>
                    <select name="division" id="division">
                        <option value="0">Не выбрано</option>
                        @foreach ($divisions as $division)
                            <option value="{{ $division->id }}">{{ $division->title }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit">Применить</button>
            </form>
        </div>

        <div class="menu_items">
            @foreach ($bases as $base)
                <a href="{{ route('show-base', ['id' => $base->id]) }}" class="menu_item">
                    <div>
                        <p>Воинская часть {{ $base->title }} <br>
                            <span>{{ $base->location->title }}</span> <br>
                            <span>Командир: {{ $base->commander->rank->title }} {{ $base->commander->Fio }}</span>
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
