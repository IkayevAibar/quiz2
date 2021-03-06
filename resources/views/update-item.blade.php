@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header h4">New item</div>
            
            <div class="card-body">
                <div class="container">
                <form action="{{ route('items.updateConcretno', ['hash' => $item->hash]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg">
                                <label for="Brand">Brand:</label>
                                <input type="text" class="form-control {{ $errors->has('Brand') ? ' is-invalid' : '' }}"  name="Brand" id="" value="{{$item->Brand}}" placeholder="Brand">
                                <div class="form-text text-danger">{{$errors->first('Brand')}}</div>    
                        </div>
                        <input type="hidden" name="hash" value={{$item->hash}}>
                        <input type="hidden" name="id" value={{$item->id}}>

                        <div class="form-group col-lg">
                            <label for="Name">Name:</label>
                            <input type="text" class="form-control {{ $errors->has('Name') ? ' is-invalid' : '' }}"  name="Name" id="" value="{{$item->Name}}" placeholder="Name">
                            <div class="form-text text-danger">{{$errors->first('Name')}}</div>    
                        </div>
                        
                        <div class="form-group col-lg">
                            <label for="Price">Price:</label>
                            <input type="text" class="form-control {{ $errors->has('Price') ? ' is-invalid' : '' }}"  name="Price" id="" value="{{$item->Price}}" placeholder="Price">    
                            <div class="form-text text-danger">{{$errors->first('Price')}}</div>    
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Gender">Gender</label>
                        <div>{{$item->Gender}}</div>
                        <select name="Gender" class="form-control {{ $errors->has('Gender') ? ' is-invalid' : '' }}">
                            <option value="Woman">Unisex</option>
                            <option value="Man">Man</option>
                            <option value="Woman">Woman</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="Description">Description:</label>
                        <textarea class="form-control {{ $errors->has('Description') ? ' is-invalid' : '' }}" name="Description" id="Description" rows="3" placeholder="Description">{{$item->Description}}</textarea>
                        <div class="form-text text-danger">{{$errors->first('Description')}}</div>    
                    </div>


                    <div class="form-group col-lg">
                            <label for="Image">Image:</label>
                            <input type="text" class="form-control {{ $errors->has('Image') ? ' is-invalid' : '' }}"  name="Image" id="" value="{{$item->Image}}" placeholder="Image source">
                            <div class="form-text text-danger">{{$errors->first('Image')}}</div>    
                    </div>

                    <button class="btn btn-primary" type="submit" name="submit">Update Item</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
