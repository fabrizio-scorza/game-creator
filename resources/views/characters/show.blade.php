@extends('layouts.app')

@section('title', 'Character')

@section('content')
    <div class="container mt-5 mb-3">
        <div class="d-flex align-items-center">
            <h2>{{$character->name}}</h2>
            <a href="{{ route('characters.edit', $character) }}" class="btn btn-secondary ms-auto">Modifica</a>  
        </div>
    </div>    
    <div class="container">
        <p><strong>Description</strong>: {{$character->description}}</p>        
        <p><strong>ATT.</strong> : {{$character->attack}}
        <strong>DEF.</strong> : {{$character->defence}}</p>
        <p><strong>SPEED</strong> : {{$character->speed}}
        <strong>HP.</strong> : {{$character->life}}</p>
    </div>
@endsection