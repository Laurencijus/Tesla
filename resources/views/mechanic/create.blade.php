@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Mechanic</div>

                <div class="card-body">

                    <form action="{{route('mechanic.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Mechanic name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Mechanic name" value="{{old('name', '')}}">
                        <small id="emailHelp" class="form-text text-muted">Please, enter new mechanic name. Max lenght 64 symbols.</small>
                    </div>

                    <div class="form-group">
                        <label for="name">Mechanic surname</label>
                        <input type="text" class="form-control" name="surname" id="surname" placeholder="Mechanic surname" value="{{old('surname', '')}}">
                        <small id="emailHelp" class="form-text text-muted">Please, enter new mechanic surname. Max lenght 64 symbols.</small>
                    </div>

                    <div class="form-group">
                        <label for="name">Mechanic Photo</label>
                        <input type="file" class="form-control-file" name="photo" id="photo">
                        <small id="emailHelp" class="form-text text-muted">Please, enter new mechanic profile photo.</small>
                    </div>
                    

                    @csrf

                    <button type="submit" class="btn btn-primary">Enter</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection