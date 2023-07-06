@extends('layouts.app')

@section('content')
<div class="container my-3">
    <h1>Modifica fumetto</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row g-4 py-4">
        <div class="col">
            <form action="{{ route('comics.update', $comic->id ) }}" method="post" class="needs-validation">
                @csrf

                @method("PUT")

                <label>title</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old("title")  ?? $comic->title}}">
                @error("title")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ old("description") ?? $comic->description}}</textarea>
                @error("description")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>price</label>
                <textarea name="price" class="form-control @error('price') is-invalid @enderror" cols="30" rows="5">{{ old("price")?? $comic->price }}</textarea>
                @error("price")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>series</label>
                <textarea name="series" class="form-control @error('series') is-invalid @enderror" cols="30" rows="5">{{ old("series")?? $comic->series }}</textarea>
                @error("series")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>type</label>
                <select class="form-control @error('type') is-invalid @enderror" name="type">
                    <option value="" @selected(!old("type")) disabled hidden>Seleziona un opzione</option>
                    <option value="fantasy" @selected(old("type")=="fantasy") >fantasy</option>
                    <option value="eroi" @selected(old("type")=="eroi")>eroi</option>
                    <option value="horror" @selected(old("type")=="horror")>horror</option>
                </select>
                @error("type")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>thumb</label>
                <input class="form-control @error('thumb') is-invalid @enderror" type="text" name="thumb" value="{{old("thumb") ?? $comic->thumb}}">
                @error("thumb")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>sale</label>
                <input class="form-control @error('sale_date') is-invalid @enderror" type="text" name="sale_date" value="{{ old("sale_date") ?? $comic->sale_date }}">
                @error("sale_date")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>artists</label>
                <input class="form-control @error('artists') is-invalid @enderror" type="text" name="artists" value="{{ old("artists") ?? $comic->artists }}">
                @error("artists")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label>writers</label>
                <input class="form-control @error('writers') is-invalid @enderror" type="text" name="writers" value="{{old("writers") ?? $comic->writers}}">
                @error("writers")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <input class="form-control mt-4 btn btn-primary" type="submit" value="Invia">
             </form>
        </div>
    </div>

</div>
@endsection
