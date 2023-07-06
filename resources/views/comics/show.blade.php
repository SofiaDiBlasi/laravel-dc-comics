@extends('layouts.app')

@section('content')
<div class="container my-3">

    <div class="row g-4">
        <div class="col">
            <a class="btn btn-primary" href="{{ route("home") }}">Torna alla lista fumetti</a>
        </div>
    </div>
    <br>
    <div class="row g-4">
        <div class="col">
            <div>
                <div class="card">
                    <h1>{{$comic->title}}</h1>
                    <p>{{ $comic->description}}</p>
                    <img width="200px" height="350px" src="{{$comic->thumb}}" alt="{{$comic->title}}">
                    <p>{{ $comic->price}}</p>
                    <p>{{ $comic->series}}</p>
                    <p>{{ $comic->type}}</p>
                    <p>{{ $comic->sale_date}}</p>
                    <p>{{ $comic->artists}}</p>
                    <p>{{ $comic->writers}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
