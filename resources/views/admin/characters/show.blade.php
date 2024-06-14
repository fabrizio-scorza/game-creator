@extends('layouts.app')

@section('title', 'Personaggio')

@section('content')
    <div class="container mb-3">
        <div class="d-flex align-items-center gap-2">
            <h2>{{$character->name}}</h2>
            <a href="{{ route('admin.characters.edit', $character) }}" class="btn btn-secondary ms-auto">Modifica</a>
            <button class="btn btn-danger delete">Elimina</button>
        </div>
    </div>    
    <div class="container">
        <p><strong>Description</strong>: {{$character->description}}</p>        
        <p><strong>ATT.</strong> : {{$character->attack}}
        <strong>DEF.</strong> : {{$character->defence}}</p>
        <p><strong>SPEED</strong> : {{$character->speed}}
        <strong>HP.</strong> : {{$character->life}}</p>
        <ul class="list-unstyled">
          @foreach ($character->items as $item)
          <li class="d-flex gap-2">
              <span><strong>{{ $item->name }}: </strong></span>
              <span>{{ $item->pivot->quantity }}</span>
          </li>
          @endforeach
      </ul>
    </div>

    <div class="modal" tabindex="-1" id="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Elimina</h5>
              <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Cliccando su "Si" eliminerai definitivamente il personaggio. E SE POI TE NE PENTI?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">No</button>
              <form action="{{ route('admin.characters.destroy', $character) }}" method="POST">
                        
                @csrf
                @method('DELETE')

                <button class="btn btn-danger delete">Si</button>
            
            </form> 
            </div>
          </div>
        </div>
    </div>
@endsection