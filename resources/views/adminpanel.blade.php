@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="card">
    @if ($items->count() > 0)
    <table class="table table-stripped">
        <thead class="thead-dark">
            <tr>
                @foreach ($columns as $column)
                    <th>{{ $column }}</th>
                @endforeach
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    @foreach($columns as $column)
                        <td>{{$item[$column]}}</td>
                    @endforeach
                    <td>
                    <form class="mb-2 mr-2" method="POST" action="{{ route('items.update', ['hash' => $item->hash]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH" />
                            <input class="btn btn-success" type="submit" value="Update">
                        </form>                    </td>
                    <td>
                        <form class="mb-2 mr-2" method="POST" action="{{ route('items.destroy', ['hash' => $item->hash]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                       
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

</div>
<?php echo $items->render(); ?>

</div>
@else
    <div>Пусто :(</div>
@endif
@endsection
