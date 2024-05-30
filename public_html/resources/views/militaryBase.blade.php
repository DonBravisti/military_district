@extends('layout.layout')
@section('content')
    <section>
        <div class="base">
            <h1>Воинская часть {{ $base->title }}</h1>
            <p>Расположение: {{ $base->location->title }}</p>
            <p>Командир: {{ $base->commander->rank->title }} {{ $base->commander->Fio }}</p>
        </div>
    </section>
@endsection
