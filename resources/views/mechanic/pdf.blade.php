<h1>{{$mechanic->name}} {{$mechanic->surname}}</h1>

@if($mechanic->photo)
<img src="{{asset('img/'.$mechanic->photo)}}" style="object-fit: contain; height: 100px;">
@endif