@extends('layouts.app')

@section('title', 'Character')

@section('content')
    <div class="container">
        <h2>{{$character->name}}</h2>
        <p><strong>Description</strong>: {{$character->description}}</p>        
        <p><strong>ATT.</strong> : {{$character->attack}}
        <strong>DEF.</strong> : {{$character->defence}}</p>
        <p><strong>SPEED</strong> : {{$character->speed}}
        <strong>HP.</strong> : {{$character->life}}</p>
    </div>
@endsection