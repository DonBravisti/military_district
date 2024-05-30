@extends('layout.layout')
@section('content')
    <style>
        form {
            display: flex;
            flex-direction: column;
            max-width: 500px;
            width: 100%;

            margin: 0 auto;
        }

        input,
        select {
            margin-bottom: 15px;
            height: 20px;
        }
    </style>

    <form action="{{ route('personnel.update', ['id' => $soldier->id]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="surname">Фамилия</label>
        <input type="text" id="surname" name="surname" value="{{ $soldier->surname }}" required>
        <label for="name">Имя</label>
        <input type="text" id="name" name="name" value="{{ $soldier->name }}" required>
        <label for="patronimyc">Отчество</label>
        <input type="text" id="patronimyc" name="patronimyc" value="{{ $soldier->patronimyc }}" required>

        <label for="rank">Воинское звание</label>
        <select name="rank" id="rank" required>
            @foreach ($ranks as $rank)
                <option @selected($rank->id == $soldier->rank->id) value="{{ $rank->id }}">{{ $rank->title }}</option>
            @endforeach
        </select>

        <label for="speciality">Специальность</label>
        <select name="speciality" id="speciality" required>
            @foreach ($specialities as $spec)
                <option @selected($spec->id == $soldier->speciality->id) value="{{ $spec->id }}">{{ $spec->title }}</option>
            @endforeach
        </select>

        <button type="submit">Обновить</button>
    </form>
@endsection
