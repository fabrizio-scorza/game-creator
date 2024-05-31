@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Weapons</h1>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Slug</th>
                      <th scope="col">Type</th>
                      <th scope="col">Category</th>
                      <th scope="col">Weight</th>
                      <th scope="col">Cost</th>
                      <th scope="col">Damage Dice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td scope="row">{{ $item->name }}</td>
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
