@extends('layouts.app')
@section('title')
Add Publishers   
@endsection
@section('sidebar')
@include('includes.sidebar')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 float-right">
            <div class="card">
                <div class="card-header">  Add Publishers  
                    <a href="{{route('publishers.list')}}" class="float-right  btn btn-primary">Back</a>
                </div>
                @include('includes.message')
                <div class="card-body">
                    <h2>Add Publishers</h2>
                    <div class="col-md-8">
                        <form action="{{route('store.publishers')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden"  name="publishers_id" value="{{@$getpub->id}}">
                            <div class="form-group ">
                                <label for="text">Publishers Name:</label>
                                <input type="text" class="form-control" id="text" placeholder="Enter Publishers Name" name="publishers_name" value="{{@$getpub->publishers_name}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('publishers_name')}}</b></span>
                            </div> 
                             
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Image Select -->
    <script type="text/javascript">
        function previewImage(event){
            var reader = new FileReader();
            var imageField = document.getElementById('imagefields')

            reader.onload = function(){
                if(reader.readyState == 2){
                    imageField.src = reader.result;
                }
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
<!-- End of Image Select -->

@endsection