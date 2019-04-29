@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New TESLA Truck</div>
                <div class="card-body">
                    <form action="{{route('truck.store')}}" method="POST">
                    <div class="form-group">
                        <label for="maker">Truck Maker</label>
                        <input type="text" class="form-control" name="maker" id="maker" aria-describedby="emailHelp" placeholder="Truck maker" value="{{old('maker', '')}}">
                        <small class="form-text text-muted">Please, enter a new truck maker. Max lenght 255 symbols.</small>
                    </div>
                    <div class="form-group">
                        <label for="plate">Plate</label>
                        <input type="text" class="form-control" name="plate" id="plate" aria-describedby="emailHelp" placeholder="Truck plate" value="{{old('plate', '')}}">
                        <small class="form-text text-muted">Please, enter a new truck plate. Max lenght 20 symbols.</small>
                    </div>
                    <div class="form-group">
                        <label for="make_year">Make Year</label>
                        <input type="text" class="form-control" name="make_year" id="make_year" aria-describedby="emailHelp" placeholder="Make Year" value="{{old('make_year', '')}}">
                        <small class="form-text text-muted">Please, enter a new truck Make Year.</small>
                    </div>
                    <div class="form-group">
                        <label for="summernote">Notices</label>
                        <textarea class="form-control" id="summernote" name="mechanic_notices" rows="3"></textarea>
                        <small class="form-text text-muted">Please, enter notices about this truck.</small>
                    </div>
                    <div class="form-group">
                            <label for="mechanic_id">Add mechanic to truck</label>
                            <select class="form-control" id="mechanic_id"  name="mechanic_id">
                                @foreach (App\Mechanic::allMechanics() as $item)
                            <option value="{{$item->id}}"> {{$item->name}} {{$item->surname}}</option>
                                //cia duos sarasa mechaniku
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Please, select mechanic from the list.</small>
                          </div>
                    @csrf
                    <button type="submit" class="btn btn-primary">Enter</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

$(document).ready(function() {
    $('#summernote').summernote();
  });
  
  </script>
@endsection