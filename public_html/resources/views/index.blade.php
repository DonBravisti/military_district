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

            max-width: 800px;
            width: 100%;
            margin: 0 auto;
        }

        .menu_item {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 300px;
            height: 70px;
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
    </style>

    <section class="main_menu">
        <div class="menu_items">
            <a href="{{ route('add-soldier') }}" class="menu_item">
                <div>
                    <p>Добавить военнослужащего</p>
                </div>
            </a>
            <a href="{{ route('personnel.rank-types') }}" class="menu_item">
                <div>
                    <p>Списки личного состава</p>
                </div>
            </a>

            <a href="{{ route('ranks') }}" class="menu_item">
                <div>
                    <p>К списку воинских званий</p>
                </div>
            </a>
            <a href="{{ route('specs') }}" class="menu_item">
                <div>
                    <p>К списку военных специализаций</p>
                </div>
            </a>

            <a href="{{ route('bases') }}" class="menu_item">
                <div>
                    <p>Воинские части</p>
                </div>
            </a>
            {{-- <a href="{{ route('specs') }}" class="menu_item">
                <div>
                    <p>К списку военных специализаций</p>
                </div>
            </a> --}}

        </div>
    </section>
@endsection
