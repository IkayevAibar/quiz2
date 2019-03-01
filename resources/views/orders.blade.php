@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card">
    @if ($orders->count() > 0)
    <table class="table table-stripped">
        <thead class="thead-dark">
            <tr>
                <th> Brand </th>
                <th> Name</th>
                <th> Value</th>
                <th> Price</th>
                <th> Gender</th>
                <th> Action</th>
                @if(Auth::user()->isAdmin())
                    <th> UserID</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                       
                    <td> {{$order->item[0]->Brand}} </td>
                    <td>  <a style="color:grey;" href="/items/{{$order->item[0]->hash}}">{{$order->item[0]->Name}} </a></td>
                    <td> {{$order->value}} </td>
                    <td> {{$order->item[0]->Price}} </td>
                    <td> {{$order->item[0]->Gender}} </td>
                    <td>
                        <form class="mb-2 mr-2" method="POST" action="{{ route('orders.destroy', ['id' => $order->id]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                    @if(Auth::user()->isAdmin())
                    <td> {{$order->user_id}} </td>
                @endif

                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="card-footer d-flex justify-content-between text-primary">
            <div>{{"Total price: ".$totalprice}}</div>
            <form class="mb-2 mr-2" method="DELETE" action="{{ route('orders.buy', ['id' => $order->id]) }}">
                                @csrf
                                <input class="btn btn" type="submit" value="Buy">
            </form>
    </div>

</div>
</div>
@else
    <div>Пусто :(</div>
@endif
@endsection
