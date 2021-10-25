@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2">
        <form action="{{ route('cari') }}" method="GET">
            <div class="col-8">
                <input type="text" class="form-control" name="cari" placeholder="Cari Pokemon" value="{{ old('cari') }}">
            </div>
            <div class="col-2">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>
    </div>
    <div class="row mb-5">
        <div class="col">
            <center>
                <a href="{{ route('suprise') }}">
                    <div class="d-grid">
                        <button class="btn btn-warning btn-block" > Suprised Me </button>
                    </div>
                </a>
            </center>
        </div>
        <div class="col">
            <center>
                <div class="dropdown">
                    <div class="d-grid">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="orderby" data-bs-toggle="dropdown" aria-expanded="false">
                            Order By
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="orderby">
                            <li><a class="dropdown-item" href="{{ route('lowest') }}">Lowest Number</a></li>
                            <li><a class="dropdown-item" href="{{ route('highest') }}">Highest Number</a></li>
                            <li><a class="dropdown-item" href="{{ route('atoz') }}">A-Z</a></li>
                            <li><a class="dropdown-item" href="{{ route('ztoa') }}">Z-A</a></li>
                        </ul>
                    </div>
                    
                    
                </div>
            </center>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mx-auto">
        @foreach ($pokemons as $pokemon)
        <div class="col">
            <div class="card h-100">
                <div class="card-header">
                    <button type="button" class="btn btn-dark btn-sm">#{{ sprintf('%03s', abs($pokemon->id)) }}</button>
                </div>
                <div class="row">
                    <a href="{{ route('detail', $pokemon->id) }}">
                        <center>
                            <img width="300px" height="350px" src="{{ asset("assets/img/$pokemon->image") }}">
                        </center>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><center>{{ $pokemon->name }}</center></h5>
                    <p class="card-text">
                        <center>
                            @php
                                $tampung = $pokemon->types;
                                $json = json_decode($tampung);
                            @endphp
                            @foreach ($json as $types)
                            <button class="btn btn-dark btn-sm">{{ $types }}</button>
                            @endforeach
                        </center>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>

@endsection