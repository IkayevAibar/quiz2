@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    @if ($items->count() > 0)
        @foreach ($items as $item)
        {{-- <div class="card" style="margin:25px;">
            <img id="image" style="width: 120px; height: 240px;" src="{{$item->Image}}"> 
            <p>{{$item->Name}}</p>
            <form method="POST" action="{{route('item.buy', ['hash' => $item->hash])}}">
                @csrf
                <input class="number" value="0" type="number" name="Count" > 
                <input class="btn" type="submit" value="Add to basket">
            </form>
            <a class="btn btn-primary" href="/items/{{$item->hash}}">See</a>
        </div> --}}
            <div class="card {{ $loop->last ? '' : 'mb-3' }}">
                <div class="card-header d-flex justify-content-between ">
                    <div>{{ $item->Brand }}</div>
                    <div>{{ $item->Name }}</div>
                    <div class="text text-danger">{{ $item->Price."$" }}</div>
                </div>
                <div class="card-body">
                    <img id="image" style="width: 50%; height: 75%;margin-left: auto;    margin-right: auto;  display: block;" src="{{$item->Image}}"> 
                    <form method="POST" action="{{route('item.buy', ['hash' => $item->hash])}}">
                        @csrf
                        <input class="number" type="number" min="0" max="100" style='min-width:61.5%;' name="Count" placeholder="Value"> 
                        <input class="btn" type="submit" value="Add to Basket" >
                    </form>
                    <a class="btn btn-primary" href="/items/{{$item->hash}}" style='width:100%;'>See</a>
                </div>
            </div>
        @endforeach 
        <?php echo $items->render(); ?>
    @else
        <div>Пусто :(</div>
    @endif
</div>
</div>

@endsection
