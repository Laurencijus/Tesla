@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mechanic Filter</div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="mechanic_id"> </label>
                        <select class="form-control" id="mechanic_id" name="mechanic_id">
                            <option value="0">Select Mechanic</option>
                            @foreach (App\Mechanic::allMechanics() as $item)
                                <option value="{{$item->id}}">{{$item->name}} {{$item->surname}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted"></small>
                    </div>
                    



   


                    


                </div>
            </div>
        
        </div>

        <div class="col-md-8 mt-3">

                <div class="card">
                        <div class="card-header">Trucks</div>
        
                        <ul class="list-group list-group-flush card-body" id="trucks_list">
                             




                                </ul> </div> </div>


    </div>
</div>
<script>
$(document).on("change", "select", function(){
    //console.log("veikia");
    var idSelect = $("select").val();
    //console.log(id);
    
    axios.post("{{route('mechanic.get-filter')}}",{id:idSelect})
    .then((response)=>{
        $("#trucks_list").slideUp(function(){
            $(this).empty();
        
        _.forEach(response.data.trucks, function(value) {
            console.log(value);
            
            
            $('<li class="list-group-item">'+value.maker+' '+value.plate+'</li>').appendTo("#trucks_list");
            

          });
          $("#trucks_list").slideDown();


        });
        console.log(response.data.trucks)


    }).catch((error)=>{
        console.log(error.response.data)
    });
});

</script>
@endsection