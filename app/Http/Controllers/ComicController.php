<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comic;
use Database\Seeders\ComicTableSeeder;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Comic::all();
        return view('comics.index' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $this->validateComic( $request->all() );

        $newComic = new Comic();
        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->artists = $data['artists'];
        $newComic->writers = $data['writers'];
        $newComic->type = $data['type'];
        $newComic->save();

        return  redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        return view('comics.show' , compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit' , compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data =  $this->validateComic( $request->all() );

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->artists = $data['artists'];
        $comic->writers = $data['writers'];
        $comic->type = $data['type'];
        $comic->update();

        return  redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('home');
    }

    private function validateComic($data) {
        $validator = Validator::make($data, [
            "title" => "required|min:5|max:50",
            "description" => "required|min:5|max:65535",
            "thumb" => "required|max:65535",
            "price" => "required|min:2|max:255",
            "series" => "required|min:5|max:255",
            "sale_date" => "required|max:20",
            "artists" => "required|max:20",
            "writers" => "required|max:20",
            "type" => "required|max:20",
        ], [
            "title.required" => "Il titolo è obbligatorio",
            "title.min" => "Il titolo deve essere almeno di :min caratteri",
            "title.max"=> "Il titolo è troppo lungo",

            "description.required" => "La descrizione è obbligatoria",
            "description.min" => "La descrizione deve essere almeno di :min caratteri",
            "description.max"=> "La descrizione è troppo lunga",

            "thumb.required" => "L'immagine è obbligatoria",
            "thumb.max"=> "Link immagine non valido",

            "price.required" => "Il prezzo è obbligatorio",
            "price.min" => "Il prezzo deve essere almeno di :min caratteri",
            "price.max"=> "Il prezzo è troppo lungo",

            "series.required" => "La serie  è obbligatoria",
            "series.min" => "La serie deve essere almeno di :min caratteri",
            "series.max"=> "La serie è troppo lunga",

            "sale_date.required" => "La data è obbligatoria",
            "sale_date.max"=> "La data  è troppo lunga",

            "artists.required" => "L'artista è obbligatorio",
            "artists.max"=> "L'artistaè troppo lungo",

            "writers.required" => "L'autore è obbligatorio",
            "writers.max"=> "L'autore è troppo lungo",

            "type.required" => "Il tipo è obbligatorio",
            "type.max"=> "Il tipo è troppo lungo",
        ])->validate();

        return $validator;
    }
}
