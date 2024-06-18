@extends('layouts.app')

@section('title','Modifica personaggio')

@section('content')

<div class="container">
  <h2 class="text-light fs-2">Modifica {{$character->name}}</h2>
</div>

<div class="container">
  <form action="{{ route('admin.characters.update', $character) }}" method="POST">

    @csrf 
    @method('PUT')

    <div class="mb-3">
      <label for="name" class="text-light form-label">Nome del Personaggio</label>
      <input type="text" name="name" class="black_bg important_text border-0 form-control" id="name" placeholder="Inserisci il nome" value="{{ old('name', $character->name) }}">
    </div>

    <div class="mb-3">
      <label for="type_id" class="text-light form-label">Classe</label>
      <select name="type_id" class="black_bg border-0 important_text form-control" id="type_id">
        <option value="">--Seleziona la classe--</option>
        @foreach ($types as $type)
            <option @selected($type->id == old('type_id', $character->type_id)) value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
      </select>  
    </div>

    <div class="mb-3">
      <label for="description" class="text-light form-label">Descrizione del Personaggio</label>
      <textarea class="black_bg important_text border-0 form-control" name="description" id="description" rows="3" placeholder="Descrizione del personaggio...">{{ old('description', $character->description) }}</textarea>
    </div>

    <div class="mb-3">
      <label for="attack" class="text-light form-label">Inserisci l'attacco</label>
      <input type="number" min="1" max="100" name="attack" class="black_bg important_text border-0 form-control" id="attack" placeholder="1-100" value="{{ old('attack', $character->attack) }}">
    </div>

    <div class="mb-3">
      <label for="defence" class="text-light form-label">Inserisci la difesa</label>
      <input type="number" min="1" max="100" name="defence" class="black_bg important_text border-0 form-control" id="defence" placeholder="1-100" value="{{ old('defence', $character->defence) }}">
    </div>

    <div class="mb-3">
      <label for="speed" class="text-light form-label">Inserisci la velocità</label>
      <input type="number" min="1" max="100" name="speed" class="black_bg important_text border-0 form-control" id="speed" placeholder="1-100" value="{{ old('speed', $character->speed) }}">
    </div>

    <div class="mb-3">
      <label for="life" class="text-light form-label">Inserisci la vita</label>
      <input type="number" min="1" max="999" name="life" class="black_bg important_text border-0 form-control" id="life" placeholder="1-999" value="{{ old('life', $character->life) }}">
    </div>

    <label class="text-light mb-2" for="checklist">Armi</label>
    <div class="mb-3 card black_bg">
      <div class="m-3 form-group" id="checklist">
        <div class="row row-cols-4">
  
          @foreach ($items as $item)
            <div class="col">
              <div class="form-check">
                <div>
                  <input @checked( in_array($item->id, old('items', $character->items->pluck('id')->all()) ) ) name="items[]" class="form-check-input" type="checkbox" value="{{ $item->id }}" id="item-{{$item->id}}">
                  <label class="form-check-label important_text pe-3" for="item-{{$item->id}}">
                    {{ $item->name }}
                  </label>
                </div>            
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    

    <button class="text-light brown">Modifica</button>
  </form>
  @if ($errors->any())
          <div class="alert alert-danger mt-3">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
</div>

@endsection