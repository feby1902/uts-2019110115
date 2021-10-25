<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemons = Pokemon::all();
        // $pokemons = Pokemon::inRandomOrder()->get();
        return view('home', compact('pokemons'));
    }

    public function suprise()
    {
        $pokemons = Pokemon::inRandomOrder()->get();
        return view('home', compact('pokemons'));
    }

    public function lowest()
    {
        $pokemons = Pokemon::get()->sortBy('id');
        return view('home', compact('pokemons'));
    }
    public function highest()
    {
        $pokemons = Pokemon::get()->sortByDesc('id');
        return view('home', compact('pokemons'));
    }
    public function atoz()
    {
        $pokemons = Pokemon::get()->sortBy('name');
        return view('home', compact('pokemons'));
    }
    public function ztoa()
    {
        $pokemons = Pokemon::get()->sortByDesc('name');
        return view('home', compact('pokemons'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pokemon = Pokemon::where('id', $id)->first();
        $jumlah = Pokemon::all()->count();
        // dd($jumlah);
        $sebelum = $id - 1;
        $sesudah = $id + 1;
        if ($sebelum == 0) {
            $dataterakhir = Pokemon::all()->last();
        } else {
            $dataterakhir = Pokemon::where('id', $sebelum)->first();
        }

        if ($sesudah > $jumlah) {
            $datasesudah = Pokemon::where('id', 1)->first();
        } else {
            $datasesudah = Pokemon::where('id', $sesudah)->first();
        }
        $jsonabilities = json_decode($pokemon->abilities);
        $jsontypes = json_decode($pokemon->types);
        $jsonevolution = json_decode($pokemon->evolutions);
        $jumlahdataevolution = count($jsonevolution);
        if ($jumlahdataevolution == 4) {
            $id1 = $jsonevolution[0];
            $id2 = $jsonevolution[1];
            $id3 = $jsonevolution[2];
            $id4 = $jsonevolution[3];

            $data1 = Pokemon::where('id', $id1)->first();
            $data2 = Pokemon::where('id', $id2)->first();
            $data3 = Pokemon::where('id', $id3)->first();
            $data4 = Pokemon::where('id', $id4)->first();
        } else if ($jumlahdataevolution == 3) {
            $id1 = $jsonevolution[0];
            $id2 = $jsonevolution[1];
            $id3 = $jsonevolution[2];

            $data1 = Pokemon::where('id', $id1)->first();
            $data2 = Pokemon::where('id', $id2)->first();
            $data3 = Pokemon::where('id', $id3)->first();
            $data4 = 0;
        } else if ($jumlahdataevolution == 2) {
            $id1 = $jsonevolution[0];
            $id2 = $jsonevolution[1];

            $data1 = Pokemon::where('id', $id1)->first();
            $data2 = Pokemon::where('id', $id2)->first();
            $data3 = 0;
            $data4 = 0;
        } else if ($jumlahdataevolution == 1) {
            $id1 = $jsonevolution[0];

            $data1 = Pokemon::where('id', $id1)->first();
            $data2 = 0;
            $data3 = 0;
            $data4 = 0;
        } else {
            $data1 = 0;
            $data2 = 0;
            $data3 = 0;
            $data4 = 0;
        }
        $meter = $pokemon->height;
        $mtoft = $meter * 3.281;
        $kg = $pokemon->weight;
        $kgtolbs = $kg * 2.205;

        return view('detail', compact('pokemon', 'datasesudah', 'dataterakhir', 'jsonabilities', 'jsontypes', 'jsonevolution', 'mtoft', 'kgtolbs', 'data1', 'data2', 'data3', 'data4'));
    }

    public function cari(Request $request)
    {
        $caripokemon = $request->cari;
        $pokemons = Pokemon::where('name', 'like', "%" . $caripokemon . "%")->get();
        return view('home', compact('pokemons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokemon $pokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon)
    {
        //
    }
}
