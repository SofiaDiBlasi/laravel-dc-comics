@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h1>Lista fumetti</h1>
    <div class="row g-4">
        <div class="col">
            <div>
                <a class="btn btn-primary" href="{{ route("comics.create") }}">Aggiungi un nuovo fumetto</a>
            </div>
        </div>
        <div class="col">
            <ul>
                @foreach ($data as $comic)
                    <li><a href="{{ route("comics.show", $comic->id) }}">{{$comic->title}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
