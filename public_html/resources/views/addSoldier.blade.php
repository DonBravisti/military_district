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

    <form action="{{ route('send') }}" method="post">

        @csrf

        <label for="surname">Фамилия</label>
        <input type="text" id="surname" name="surname" required>
        <label for="name">Имя</label>
        <input type="text" id="name" name="name" required>
        <label for="patronimyc">Отчество</label>
        <input type="text" id="patronimyc" name="patronimyc" required>

        <label for="rank">Воинское звание</label>
        <select name="rank" id="rank" required>
            @foreach ($ranks as $rank)
                <option value="{{ $rank->id }}">{{ $rank->title }}</option>
            @endforeach
        </select>

        <label for="speciality">Специальность</label>
        <select name="speciality" id="speciality" required>
            @foreach ($specialities as $spec)
                <option value="{{ $spec->id }}">{{ $spec->title }}</option>
            @endforeach
        </select>

        <button type="submit">Send</button>
    </form>
@endsection
