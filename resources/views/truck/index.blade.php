@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of Trucks</div>

                <div class="card-body">
                        <div class="list-group">
                        
                    @foreach ($collection as $truck)
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-9">
                        <a href="{{route('truck.show', $truck)}}" class="list-group-item list-group-item-action list-group-item-primary">{{$truck->plate}} Mechanikas: {{$truck->showMechanic->surname}}</a>
                        </div>
                        <div class="col-md-3" style="display:flex; justify-content:space-around; align-items:center;">
                        <a href="{{route('truck.edit', $truck)}}">
                            <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M7 14c-1.66 0-3 1.34-3 3 0 1.31-1.16 2-2 2 .92 1.22 2.49 2 4 2 2.21 0 4-1.79 4-4 0-1.66-1.34-3-3-3zm13.71-9.37l-1.34-1.34c-.39-.39-1.02-.39-1.41 0L9 12.25 11.75 15l8.96-8.96c.39-.39.39-1.02 0-1.41z"/></svg>
                            </button>
                        </a>
                        <form action="{{route('truck.destroy', $truck)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zm2.46-7.12l1.41-1.41L12 12.59l2.12-2.12 1.41 1.41L13.41 14l2.12 2.12-1.41 1.41L12 15.41l-2.12 2.12-1.41-1.41L10.59 14l-2.13-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4z"/><path fill="none" d="M0 0h24v24H0z"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
                    @endforeach
                
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection