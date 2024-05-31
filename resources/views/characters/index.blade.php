@extends('layouts.app')

@section('title','Characters')

@section('content')
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-auto">
                <h1>Personaggi</h1>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{route('characters.create')}}" class="btn btn-secondary">Crea</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-cols-3">
            @foreach ($characters as $character)
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>
                            <a href="{{route('characters.show', $character)}}" class="link-underline link-underline-opacity-0 link-danger">{{$character->name}}</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <p><strong>ATT.</strong> : {{$character->attack}}</p>
                        <p><strong>DEF.</strong> : {{$character->defence}}</p>
                        <p><strong>SPEED</strong> : {{$character->speed}}</p>
                        <p><strong>HP.</strong> : {{$character->life}}</p>
                    </div>                    
                </div>
            </div>
                
            @endforeach
        </div>
    </div>
@endsection