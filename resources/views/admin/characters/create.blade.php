@extends('layouts.app')

@section('title','Crea personaggio')

@section('content')

<div class="container">
  <h2 class="fs-2">Crea un nuovo Personaggio</h2>
</div>

<div class="container">
  <form action="{{ route('admin.characters.store') }}" method="POST">

    @csrf 

    <div class="mb-3">
      <label for="name" class="form-label">Nome del Personaggio</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Inserisci il nome" value="{{ old('name') }}">
    </div>


    <div class="mb-3">
      <label for="type_id" class="form-label">Classe</label>
      <select name="type_id" class="form-control" id="type_id">
        <option value="">--Seleziona la classe--</option>
        @foreach ($types as $type)
            <option @selected($type->id == old('type_id')) value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
      </select>  
    </div>


    <div class="mb-3">
      <label for="description" class="form-label">Descrizione del Personaggio</label>
      <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrizione del personaggio...">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
      <label for="attack" class="form-label">Inserisci l'attacco</label>
      <input type="number" min="1" max="100" name="attack" class="form-control" id="attack" placeholder="1-100" value="{{ old('attack') }}">
    </div>

    <div class="mb-3">
      <label for="defence" class="form-label">Inserisci la difesa</label>
      <input type="number" min="1" max="100" name="defence" class="form-control" id="defence" placeholder="1-100" value="{{ old('defence') }}">
    </div>

    <div class="mb-3">
      <label for="speed" class="form-label">Inserisci la velocità</label>
      <input type="number" min="1" max="100" name="speed" class="form-control" id="speed" placeholder="1-100" value="{{ old('speed') }}">
    </div>

    <div class="mb-3">
      <label for="life" class="form-label">Inserisci la vita</label>
      <input type="number" min="1" max="999" name="life" class="form-control" id="life" placeholder="1-999" value="{{ old('life') }}">
    </div>

    {{-- <div class="mb-3 form-group" id="checklist">
      <label for="checklist">Armi</label>
      <div class="d-flex gap-2 flex-wrap">

        @foreach ($items as $item)
  
          <div class="form-check">
            <input @checked( in_array($item->id, old('items',[])) ) name="items[{{$loop->index}}]['id']" class="form-check-input" type="checkbox" value="{{ $item->id }}" id="item-{{$item->id}}">
            <label class="form-check-label" for="item-{{$item->id}}">
              {{ $item->name }}
            </label>
            <input type="number" min="1" max="20" name="items[{{$loop->index}}]['qty']">
          </div>
            
        @endforeach
      </div>
    </div> --}}
    

    <button class="btn btn-secondary">Crea</button>
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