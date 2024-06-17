@extends('layouts.app')

@section('title','Personaggi')

@section('content')
    <div class="container pb-3">
        <div class="row align-items-center">
            <div class="col-auto">
                <h1 class="text-light">Personaggi</h1>
            </div>
            <div class="col-auto ms-auto">
                <button class="button brown">
                    <a href="{{route('admin.characters.create')}}" class=" link-underline link-underline-opacity-0 text-light">Crea</a>
                </button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-cols-3 row-gap-3">
            @foreach ($characters as $character)
            <div class="col">
                <div class="black_bg card">
                    <div class="card-header important_text">
                        <h2>
                            <a href="{{route('admin.characters.show', $character)}}" class="link-underline link-underline-opacity-0 important_text">{{$character->name}}</a>
                        </h2>
                        <div>
                            {{$character->type->name}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-2">
                            <div class="col text-light">
                                <p><strong class="important_text">ATT.</strong> : {{$character->attack}}</p>
                                <p><strong class="important_text">DIF.</strong> : {{$character->defence}}</p>
                                <p><strong class="important_text">VEL.</strong> : {{$character->speed}}</p>
                                <p><strong class="important_text">HP.</strong> : {{$character->life}}</p>
                            </div>
                            <div class="col">
                                <div class="d-flex important_text justify-content-between">
                                    <p><strong>Armi</strong></p>
                                    <p><strong>Quantità</strong></p>
                                </div>
                                <div>
                                    <ul class="list-unstyled text-light">
                                        @foreach ($character->items as $item)
                                        <li class="d-flex justify-content-between">
                                            <span>{{ $item->name }}</span>
                                            <span>{{ $item->pivot->quantity }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer d-flex gap-2">
                        <button class="brown">
                            <a href="{{ route('admin.characters.edit', $character) }}" class="link-underline link-underline-opacity-0 text-light">Modifica</a>  
                        </button>

                        <button data-bs-toggle="modal" data-bs-target="#modal-{{$character->id}}" class="orange delete">Elimina</button>
                        
                    </div>                    
                </div>
            </div>
                
            <div class="modal" id="modal-{{$character->id}}" tabindex="-1" aria-labelledby="modal-label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="bg-dark orange_border text-light modal-content">
                    <div class="modal-header border-0">
                      <h5 class="modal-title">Elimina</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                      <p>Cliccando su "Si" eliminerai definitivamente il personaggio. E SE POI TE NE PENTI?</p>
                    </div>
                    <div class="modal-footer border-0">
                      <button type="button" class=" blue text-light" data-bs-dismiss="modal">No</button>
                      <form action="{{ route('admin.characters.destroy', $character) }}" method="POST">
                                
                        @csrf
                        @method('DELETE')
        
                        <button class=" orange">Si</button>
                    
                        </form> 
                    </div>
                  </div>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>

    
@endsection
