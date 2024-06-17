@extends('layouts.app')

@section('title', 'Personaggio')

@section('content')
    <div class="container mb-3">
        <div class="d-flex text-light align-items-center gap-2">
            <h2>{{$character->name}}</h2>
            <button class="brown">
              <a href="{{ route('admin.characters.edit', $character) }}" class="link-underline link-underline-opacity-0 text-light">Modifica</a>
            </button>
            <button class="orange delete">Elimina</button>
        </div>
    </div>    
    <div class="container">
        {{-- <p><strong>Description</strong>: {{$character->description}}</p>        
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
      <p><strong>Classe: </strong>{{$character->type->name}}</p>
      <p>{{$character->type->description}}</p> --}}
      <div class="card text-light black_bg">
        <div class="card-body">
          <h5 class="card-title important_text">{{$character->type->name}}</h5>
          <h6 class="card-subtitle mb-2 important_text mb-4">{{$character->type->description}}</h6>
          <p class="card-text">{{$character->description}}</p>
          <div class="row row-cols-2">
            <div class="col">
              <h5 class="important_text">Statistiche</h5>
              <div>
                <span class="important_text"><strong>ATT: </strong></span>
                <span>{{$character->attack}}</span>
              </div>
              <div>
                <span class="important_text"><strong>DIF: </strong></span>
                <span>{{$character->defence}}</span>
              </div>
              <div>
                <span class="important_text"><strong>VEL: </strong></span>
                <span>{{$character->speed}}</span>
              </div>
              <div>
                <span class="important_text"><strong>HP: </strong></span>
                <span>{{$character->life}}</span>
              </div>
            </div>
            <div class="col">
              <h5 class="important_text">Inventario</h5>
              <ul class="list-unstyled">
                @foreach ($character->items as $item)
                <li class="d-flex gap-2">
                    <span>{{ $item->name }}: </span>
                    <span>{{ $item->pivot->quantity }}</span>
                </li>
                @endforeach
            </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" tabindex="-1" id="modal">
        <div class="modal-dialog">
          <div class="bg-dark orange_border text-light modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title">Elimina</h5>
              <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Cliccando su "Si" eliminerai definitivamente il personaggio. E SE POI TE NE PENTI?</p>
            </div>
            <div class="modal-footer border-0">
              <button type="button" class="close blue text-light" data-bs-dismiss="modal">No</button>
              <form action="{{ route('admin.characters.destroy', $character) }}" method="POST">
                        
                @csrf
                @method('DELETE')

                <button class="orange delete">Si</button>
            
            </form> 
            </div>
          </div>
        </div>
    </div>
@endsection