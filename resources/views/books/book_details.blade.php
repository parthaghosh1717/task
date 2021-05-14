@extends('layouts.app')
@section('title')
Books Details  
@endsection
@section('sidebar')
@include('includes.sidebar')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 float-right">
            <div class="card">
                <div class="card-header">Books Details
                    <a href="{{route('books.list')}}" class="float-right  btn btn-primary">Back</a>
                </div>
                @include('includes.message')
                <div class="card-body">
                    <h3 style="margin-left: 10px;">Book Details</h3>
                    <div style="padding: 20px;">
                        <p>Book Name: {{@$bookdetails->book_name}}</p>
                        <p>Publishers Name: {{@$bookdetails->gerPublishers->publishers_name}}</p>
                        <p>Author Name: {{@$bookdetails->author_name}}</p>
                        <p>Volume No: {{@$bookdetails->volume_no}}</p>
                        <p>Total Pages: {{@$bookdetails->total_pages}}</p>
                        <p>ISBN Number: {{@$bookdetails->isbn_Number}}</p>
                        <p>Cover Image : <img  src="{{ asset('storage/app/public/images/book_image/'.@$bookdetails->image) }}" style="width: 80px;height: 60px;"></p>
                    </div>
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
 
@endsection