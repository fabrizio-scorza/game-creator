@extends('layouts.app')

@section('title','Armi')

@section('content')
    <div class="container">
        <h1 class="text-light">Armi</h1>
        <div class="scroll">
            <table class="text-light black_bg">
                <thead >
                    <tr class="important_text">
                        <th>Nome</th>
                        <th>Slug</th>
                        <th>Tipo</th>
                        <th>Categoria</th>
                        <th>Peso</th>
                        <th>Costp</th>
                        <th>Danno</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->weight }}</td>
                            <td>{{ $item->cost }}</td>
                            <td>{{ $item->damage_dice}}</td>
                        </tr>  
                    @endforeach                     
                </tbody>
            </table>
        </div>
    </div>
@endsection

{{-- @section('content')
    <div class="container">
        <h1 class="white">Armi</h1>
    </div>
    <div class="container">
        <div class="row row-cols-4">
            @foreach ($items as $item)
                <div class="col">
                    <div class="card mb-3 card_colour">
                        <div class="card-body white">
                            <h5 class="card-title important_text">{{$item->name}}</h5>
                            <h6 class="card-subtitle mb-2 important_text">{{$item->category}}</h6>
                            <p class="card-text"><strong class="important_text">Peso:</strong>{{$item->weight}}</p>
                            <p class="card-text"><strong class="important_text">Costo:</strong>{{$item->cost}}</p>
                            <p class="card-text"><strong class="important_text">Danno:</strong>{{$item->damage_dice}}</p>
                        </div>
                        </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection --}}
