@extends('layouts.app')
@section('title')
Publishers List  
@endsection
@section('sidebar')
@include('includes.sidebar')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 float-right">
            <div class="card">
                <div class="card-header">Manage Publishers
                    <a href="{{route('add.publishers')}}" class="float-right  btn btn-primary">Add Publishers</a>
                </div>
                @include('includes.message')
                <div class="card-body">
                    <h4>Publisher List</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 70%">Publisher Name</th>                                 
                                <th style="width: 30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publisherlist as $display) 
                                <tr>
                                    <td>{{@$display->publishers_name}}</td>                                     
                                    <td><a href="{{route('edit.publisher',[$display->id])}}" class="btn btn-success">Edit</a><a href="{{route('delete.publisher',[$display->id])}}" class="btn btn-danger" style="margin-left: 10px;" onclick="return confirm('Do you want remove this publishers?')">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                    <div class="paginate float-right">
                        {{$publisherlist->links()}}
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