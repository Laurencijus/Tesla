@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{$mechanic->name}} {{$mechanic->surname}}</div>

                <div class="card-body">

                    <form action="{{route('mechanic.update', $mechanic)}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Mechanic name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Mechanic name" value="{{old('name', $mechanic->name)}}">
                        <small id="emailHelp" class="form-text text-muted">Please, enter new mechanic name. Max lenght 64 symbols.</small>
                    </div>

                    <div class="form-group">
                        <label for="name">Mechanic surname</label>
                        <input type="text" class="form-control" name="surname" id="surname" aria-describedby="emailHelp" placeholder="Mechanic surname" value="{{old('surname', $mechanic->surname)}}">
                        <small id="emailHelp" class="form-text text-muted">Please, enter new mechanic surname. Max lenght 64 symbols.</small>
                    </div>

                    <div class="form-group">
                        <label for="name">Mechanic Photo</label>
                        <input type="file" class="form-control-file" name="photo" id="photo">
                        <small id="emailHelp" class="form-text text-muted">Please, enter new mechanic profile photo.</small>
                    </div>

                    <div class="form-group">
                    @if($mechanic->photo)
                    <a href="{{route('mechanic.download', $mechanic)}}">
                    <img src="{{asset('img/'.$mechanic->photo)}}" style="object-fit: contain; height: 100px;">
                    </a>
                    @endif
                    </div>

                    @csrf

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection