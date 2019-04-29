@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of TESLA Mechanics</div>

                <div class="card-body">
                        <div class="list-group">
                        
                    @foreach ($collection as $mechanic)
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-5">
                        <a href="{{route('mechanic.edit', $mechanic)}}" class="list-group-item list-group-item-action list-group-item-primary">{{$mechanic->name}} {{$mechanic->surname}}</a>
                        </div>
                        <div class="col-md-2">
                                <a href="{{route('mechanic.pdf', $mechanic)}}" class="list-group-item list-group-item-action list-group-item-primary">PDF</a>
                                </div>
                        <div class="col-md-3">
                            @if($mechanic->photo)
                            <a href="{{route('mechanic.download', $mechanic)}}">
                            <img src="{{asset('img/'.$mechanic->photo)}}" style="object-fit: contain; height: 100px;">
                            </a>
                            @endif
                        </div>
                        <div class="col-md-2" style="display:flex; justify-content:center; align-items:center;">
                        <form action="{{route('mechanic.destroy', $mechanic)}}" method="POST">
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