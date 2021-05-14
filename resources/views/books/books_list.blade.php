@extends('layouts.app')
@section('title')
Books List  
@endsection
@section('sidebar')
@include('includes.sidebar')
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 float-right">
            <div class="card">
                <div class="card-header">Manage Books
                    <a href="{{route('add.books')}}" class="float-right  btn btn-primary">Add Books</a>
                </div>
                @include('includes.message')
                <div class="card-body">
                    <h4>Books List</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 20%">Book Name</th>
                                <th style="width: 20%">Publisher Name</th>
                                <th style="width: 20%">Author Name</th>
                                <th style="width: 20%">Cover Image</th>                                 
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($booklist as $display) 
                                <tr>
                                    <td>{{$display->book_name}}</td>
                                    <td>{{$display->gerPublishers->publishers_name}}</td>
                                    <td>{{$display->author_name}}</td>
                                    <td><img  src="{{ asset('storage/app/public/images/book_image/'.@$display->image) }}" style="width: 80px;height: 60px;"></td>                                     
                                    <td><a href="{{route('view.book',[$display->id])}}" class="btn btn-primary">View</a><a href="{{route('edit.book',[$display->id])}}" class="btn btn-success" style="margin-left: 10px;">Edit</a><a href="{{route('delete.book',[$display->id])}}" class="btn btn-danger" style="margin-left: 10px;" onclick="return confirm('Do you want remove this book?')">Delete</a></td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                    <div class="paginate float-right">
                         {{$booklist->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
 
@endsection