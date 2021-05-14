<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Models\Book;
use File; 
use Storage;
use DB;

class BooksController extends Controller
{
     /**
    *   Method      : booksList
    *   Description : This is use to display books list.
    *   Author      : Partha
    *   Date        : 30-04-2020
    **/
    public function booksList(Request $request)
    {
    	 
    	$data['booklist'] = Book::orderby('created_at','DESC')->paginate(10);
    	return view('books.books_list')->with($data);
    }

     /**
    *   Method      : create
    *   Description : This is use to new books insert form.
    *   Author      : Partha
    *   Date        : 30-04-2020
    **/
    public function create(Request $request)
    { 
    	$data['publisherlist'] = Publisher::orderby('created_at','DESC')->get();
    	return view('books.add_books_from')->with($data);
    }

     /**
    *   Method      : store
    *   Description : This is use to save book details.
    *   Author      : Partha
    *   Date        : 30-04-2020
    **/
    public function store(Request $request)
    {
    	$this->validate($request,["book_name"=>"required",                                 
                                "author_name" =>  "required|string",
                                "publishers_id" =>  "required|numeric",  
                                "volume_no" =>  "required|numeric", 
                                "total_pages" =>  "required|numeric",
                                "isbn_Number" =>  "required|numeric|unique:books",                              
                                'image' => 'mimes:jpeg,jpg,png|max:10000|dimensions:min_width=100,min_height=100',
                                 
                                  ],
                                ["book_name.required"=>"Enter Book Name ***", 
                                "author_name.required"=>"Enter Book Author Name ***",
                                "publishers_id.required"=>"Choose Publisher ***",
                                "volume_no.required"=>"Enter volume no ***",
                                "total_pages.required"=>"Enter total page ***",
                                "isbn_Number.required"=>"Enter ISBN Number***",                                   
                                'image.mimes'=>'Logo must be JPEG/JPG/ or PNG type.',
                                'image.dimensions'=>'Logo minimum 100px X 100px needed.',                                
                                ]);
    	$updatebook= Book::find($request->book_id);
    	$input['book_name'] = $request->book_name;
        $input['author_name'] = $request->author_name;
        $input['publishers_id'] = $request->publishers_id;
        $input['volume_no'] = $request->volume_no;
        $input['total_pages'] = $request->total_pages;
        $input['isbn_Number'] = $request->isbn_Number;         

        if(@$request->hasFile('image')){ 

            @unlink(storage_path('app/public/images/book_image/'.$updatebook->image));  

            $image = $request->image;
            $filename = time().'-'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
            Storage::putFileAs('public/images/book_image/', $image, $filename);
           
            $input['image'] =  $filename;
        }

        if (@$request->book_id) 
        {

            Book::where('id',$request->book_id)->update($input);
            return redirect()->back()->with('success','Book data updated successfully.');
        }



        $companydata = Book::create($input);

        return redirect()->route('add.books')->with('success', 'Book is added successfully.'); 


    }

    /**
    *   Method      : show
    *   Description : This is use to show book data.
    *   Author      : Partha
    *   Date        : 30-04-2020
    **/
    public function show($id)
    {
        $data['bookdetails'] = Book::find($id);

        return view('books.book_details')->with($data);
    }

    /**
    *   Method      : edit
    *   Description : This is use to edit book data.
    *   Author      : Partha
    *   Date        : 30-04-2020
    **/
    public function edit($id)
    { 

        $data['getbook'] = DB::table('books')->where('id', '=', $id)->first();
        $data['publisherlist'] = Publisher::orderby('created_at','DESC')->get();
         // dd($data);
         
        return view('books.add_books_from')->with($data);
    }

    /**
    *   Method      : destroy
    *   Description : This is use to delete book data.
    *   Author      : Partha
    *   Date        : 30-04-2020
    **/

    public function destroy($id)
    {
        // dd($id);
        $removebook = Book::find($id);

        if(!is_null($removebook))
          {
            @unlink(storage_path('app/public/images/companylogo/'.$removebook->image));
            $removebook->delete();
          } 
        return redirect()->route('books.list')->with('success','Book is removed successfully');  
    }

}
