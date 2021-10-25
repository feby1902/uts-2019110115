@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <a href="{{ route('detail', $dataterakhir->id) }}">
                    <div class="d-grid">
                        <button class="btn btn-danger">#{{ sprintf('%03s', abs($dataterakhir->id)) }}</button>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('detail', $datasesudah->id) }}">
                    <div class="d-grid">
                        <button class="btn btn-danger">#{{ sprintf('%03s', abs($datasesudah->id)) }}</button>
                    </div>
                </a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="card mb-3" style="max-width: 1600px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset("assets/img/$pokemon->image") }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <small class="text-muted">#{{ sprintf('%03s', abs($pokemon->id)) }}</small>
                            <h2 class="card-title">{{ $pokemon->name }}</h2>
                            <p class="card-text">Abilities</p>
                            @foreach ($jsonabilities as $abilities)
                                <button class="btn btn-dark btn-sm">{{ $abilities }}</button>
                            @endforeach
                            <p class="card-text mt-2" style="font-size: 21pt;"> Profile </p>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Height</th>
                                        <td class="text-muted">{{ $mtoft }} ft ({{ $pokemon->height }} m)</td>
                                        <th>Weight</th>
                                        <td class="text-muted">{{ $kgtolbs }} lbs ({{ $pokemon->weight }} kg)</td>
                                    </tr>
                                    <tr>
                                        <th>Species</th>
                                        <td class="text-muted">{{ $pokemon->species }}</td>
                                        <th>Types</th>
                                        <td>
                                            @foreach ($jsontypes as $types)
                                                <button class="btn btn-dark btn-sm">{{ $types }}</button>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="card-text" style="font-size: 21pt;"> Stat</p>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th width="200px">HP</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $pokemon->hp }}%" aria-valuenow="{{ $pokemon->hp }}" aria-valuemin="0" aria-valuemax="200">{{ $pokemon->hp }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Attack</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $pokemon->attack }}%" aria-valuenow="{{ $pokemon->attack }}" aria-valuemin="0" aria-valuemax="200">{{ $pokemon->attack }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Defense</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $pokemon->defense }}%" aria-valuenow="{{ $pokemon->defense }}" aria-valuemin="0" aria-valuemax="200">{{ $pokemon->defense }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sp. Attack</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $pokemon->sp_attack }}%" aria-valuenow="{{ $pokemon->sp_attack }}" aria-valuemin="0" aria-valuemax="200">{{ $pokemon->sp_attack }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sp. Defense</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $pokemon->sp_defense }}%" aria-valuenow="{{ $pokemon->sp_defense }}" aria-valuemin="0" aria-valuemax="200">{{ $pokemon->sp_defense }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Speed</th>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $pokemon->speed }}%" aria-valuenow="{{ $pokemon->speed }}" aria-valuemin="0" aria-valuemax="200">{{ $pokemon->speed }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($data1 != '0')
            <div class="row row-cols-1 row-cols-md-3 g-4">
                
                    <div class="col">
                        <div class="card">
                            <a href="{{ route('detail', $data1->id) }}">
                            <img width="250px" height="350px" src="{{ asset("assets/img/$data1->image") }}" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><center>{{ $data1->name }}</center></h5>
                            </div>
                        </div>
                    </div>
        @endif
        @if ($data2 != '0')
                
                    <div class="col">
                        <div class="card">
                            <a href="{{ route('detail', $data2->id) }}">
                                <img width="300px" height="350px" src="{{ asset("assets/img/$data2->image") }}" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><center>{{ $data2->name }}</center></h5>
                            </div>
                        </div>
                    </div>
        @endif
        
        @if ($data3 != '0')
            <a href="{{ route('detail', $data3->id) }}">
                <div class="col">
                    <div class="card">
                        <a href="{{ route('detail', $data3->id) }}">
                         <img width="300px" height="350px" src="{{ asset("assets/img/$data3->image") }}" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><center>{{ $data3->name }}</center></h5>
                        </div>
                    </div>
                </div>
        @endif
        @if ($data4 != '0')
            <a href="{{ route('detail', $data4->id) }}">
                <div class="col">
                    <div class="card">
                        <a href="{{ route('detail', $data4->id) }}">
                         <img width="300px" height="350px" src="{{ asset("assets/img/$data4->image") }}" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><center>{{ $data4->name }}</center></h5>
                        </div>
                    </div>
                </div>
        </div>
        @endif
    </div>
@endsection