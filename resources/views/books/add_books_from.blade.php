@extends('layouts.app')
@section('title')
Add Book  
@endsection
@section('sidebar')
@include('includes.sidebar')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 float-right">
            <div class="card">
                <div class="card-header"> Add Book  
                    <a href="{{route('books.list')}}" class="float-right  btn btn-primary">Back</a>
                </div>
                @include('includes.message')
                <div class="card-body">
                    <h2> Add Book</h2>
                    <div class="col-md-8">
                        <form action="{{route('store.book')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden"  name="book_id" value="{{@$getbook->id}}">
                            <div class="form-group ">
                                <label for="text">Book Name:</label>
                                <input type="text" class="form-control" id="text" placeholder="Enter book name" name="book_name" value="{{@$getbook->book_name}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('book_name')}}</b></span>
                            </div>

                             
                            <div class="form-group ">
                                <label for="author_name">Author Name:</label>
                                <input type="text" class="form-control" id="author_name" placeholder="Enter book author name" name="author_name" value="{{@$getbook->author_name}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('author_name')}}</b></span>
                            </div> 

                            <div class="form-group">
                                <label for="sel1">Choose Publisher</label>
                                <select class="form-control" id="sel1" name="publishers_id">
                                    <option value="">select</option>
                                    @foreach(@$publisherlist as $display)
                                        <option value="{{@$display->id}}" {{@$getbook->id==@$display->id ? 'selected' : ''}}>{{$display->publishers_name}}</option>
                                    @endforeach
                                </select>
                                <span style="color:#cc0000;"><b>{{$errors->first('publishers_id')}}</b></span>
                            </div>
 


                            <div class="form-group ">
                                <label for="volume_no">Volume No:</label>
                                <input type="text" class="form-control" id="volume_no" name="volume_no" value="{{@$getbook->volume_no}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('volume_no')}}</b></span>
                            </div>

                            <div class="form-group ">
                                <label for="total_pages">Total Pages:</label>
                                <input type="text" class="form-control" id="total_pages" name="total_pages" value="{{@$getbook->total_pages}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('total_pages')}}</b></span>
                            </div>

                             
                            <div class="form-group ">
                                <label for="isbn_Number">ISBN Number:</label>
                                <input type="text" class="form-control" id="isbn_Number" name="isbn_Number" value="{{@$getbook->isbn_Number}}">
                                <span style="color:#cc0000;"><b>{{$errors->first('isbn_Number')}}</b></span>
                            </div>
                            <div class="form-group row "> 
                                <label for="exampleInputimage" class="col-sm-3 col-form-label">Book Cover Image</label> 
                                <input type="file" name="image"  onchange="previewImage(event)"> 

                                <div class="polaroid ">
                                   
                                  @if(@$getbook->image)
                                    <img src="{{ asset('storage/app/public/images/book_image/'.@$getbook->image) }}"   style="width: 100px;height: 120px;" id="imagefields">
                                    @else
                                    <img src="{{url('public/images/company_logo.png')}}" alt="5 Terre" style="width: 100px;height: 120px;" id="imagefields">
                                  @endif 
                                </div><span style="color:#cc0000;"><b>{{$errors->first('image')}}</b></span>
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