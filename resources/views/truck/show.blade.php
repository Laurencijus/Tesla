@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Truck {{$truck->plate}} information</div>

                    <div class="card-body">

                            <div class="list-group">
                                <div><a href="{{route('truck.edit', $truck)}}">Edit</a></div>
                                <div><b>Truck Maker:</b> {{$truck->maker}}</div>
                                <div><b>Truck Plate:</b> {{$truck->plate}}</div>
                                <div>
                                    <b>Mechanic:</b>
                                    {{$truck->showMechanic->name}} {{$truck->showMechanic->surname}}
                                </div>
                                <h2>Notices:</h2>
                                <div>
                                        {!!$truck->mechanic_notices!!}
                                </div>  
                            </div>

                            
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection