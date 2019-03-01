@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between text-primary">
                <div>{{ $item->Brand }}</div>
                <div class="text-secondary">{{ $item->created_at }}</div>
            </div>
            <div class="card-body container">
                <div class="row no-gutters d-flex justify-content-between">
                    <div class="col-md-8">
                        <ul>
                            <li>Name: {{$item->Name}}</li>
                            <li>Price: {{$item->Price}}</li>
                            <li>Gender: {{$item->Gender}}</li>
                        </ul>
                        <p>Описание:</p>
                        <p>{{$item->Description}}</p>
            <img id="image" style="width: 200px; height: 250px;" src="{{$item->Image}}"> 
                        
                    </div>
                </div>
            </div>
            <div class="d-flex">
                @if(Auth::check())
                <form class="mb-2 mr-2" method="POST" action="{{route('item.buy', ['hash' => $item->hash])}}">
                    @csrf
                    <input class="number" type="number" name="Count"> 
                    <input class="btn" type="submit" value="Add to basket">
                </form>
                @if (Auth::user()->isAdmin())
                <form class="mb-2 mr-2" method="POST" action="{{route('items.destroy', ['hash' => $item->hash])}}">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input class="btn" type="submit" value="Delete">
                </form>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
