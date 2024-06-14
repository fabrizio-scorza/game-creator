@extends('layouts.app')

@section('title','Modifica personaggio')

@section('content')

<div class="container">
  <h2 class="fs-2">Crea un nuovo Personaggio</h2>
</div>

<div class="container">
  <form action="{{ route('admin.characters.update', $character) }}" method="POST">

    @csrf 
    @method('PUT')

    <div class="mb-3">
      <label for="name" class="form-label">Nome del Personaggio</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Inserisci il nome" value="{{ old('name', $character->name) }}">
    </div>

    <div class="mb-3">
      <label for="type_id" class="form-label">Classe</label>
      <select name="type_id" class="form-control" id="type_id">
        <option value="">--Seleziona la classe--</option>
        @foreach ($types as $type)
            <option @selected($type->id == old('type_id', $character->type_id)) value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
      </select>  
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Descrizione del Personaggio</label>
      <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrizione del personaggio...">{{ old('description', $character->description) }}</textarea>
    </div>

    <div class="mb-3">
      <label for="attack" class="form-label">Inserisci l'attacco</label>
      <input type="number" min="1" max="100" name="attack" class="form-control" id="attack" placeholder="1-100" value="{{ old('attack', $character->attack) }}">
    </div>

    <div class="mb-3">
      <label for="defence" class="form-label">Inserisci la difesa</label>
      <input type="number" min="1" max="100" name="defence" class="form-control" id="defence" placeholder="1-100" value="{{ old('defence', $character->defence) }}">
    </div>

    <div class="mb-3">
      <label for="speed" class="form-label">Inserisci la velocità</label>
      <input type="number" min="1" max="100" name="speed" class="form-control" id="speed" placeholder="1-100" value="{{ old('speed', $character->speed) }}">
    </div>

    <div class="mb-3">
      <label for="life" class="form-label">Inserisci la vita</label>
      <input type="number" min="1" max="999" name="life" class="form-control" id="life" placeholder="1-999" value="{{ old('life', $character->life) }}">
    </div>

    

    <button class="btn btn-secondary">Modifica</button>
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