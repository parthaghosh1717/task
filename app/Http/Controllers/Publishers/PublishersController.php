<?php

namespace App\Http\Controllers\Publishers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Models\Book;
use DB;

class PublishersController extends Controller
{
     /**
    *   Method      : publishersList
    *   Description : This is use to display Publishers list.
    *   Author      : Partha
    *   Date        : 30-04-2020
    **/
    public function publishersList(Request $request)
    {
    	 
    	$data['publisherlist'] = Publisher::orderby('created_at','DESC')->paginate(10);
    	return view('publishers.publishers_list')->with($data);
    }

     /**
    *   Method      : create
    *   Description : This is use to new Publishers insert form.
    *   Author      : Partha
    *   Date        : 30-04-2020
    **/
    public function create(Request $request)
    { 
    	return view('publishers.add_publishers_from');
    }

     /**
    *   Method      : store
    *   Description : This is use to save publishers data.
    *   Author      : Partha
    *   Date        : 30-04-2020
    **/
    public function store(Request $request)
    {
    	$this->validate($request,["publishers_name"=>"required" 
                                  ],
                                ["publishers_name.required"=>"Enter Publishers Name ***", 
                                ]);

    	$input['publishers_name'] = $request->publishers_name;
    	 
    	if(@$request->publishers_id)
        {
            Publisher::where('id',$request->publishers_id)->update($input);
            return redirect()->route('publishers.list')->with('success','Publisher data updated successfully.');
        }
    	$pubdata = Publisher::create($input);

        return redirect()->back()->with('success', 'Publisher is added successfully.'); 
    }
    /**
    *   Method      : edit
    *   Description : This is use to edit publishers data.
    *   Author      : Partha
    *   Date        : 30-04-2020
    **/
    public function edit($id)
    { 

        $data['getpub'] = DB::table('publishers')->where('id', '=', $id)->first();
         // dd($data);
         
        return view('publishers.add_publishers_from')->with($data);
    }

    /**
    *   Method      : destroy
    *   Description : This is use to delete publishers data.
    *   Author      : Partha
    *   Date        : 30-04-2020
    **/

    public function destroy($id)
    {

        $removepub= Publisher::find($id);

        $chk = Book::where('publishers_id',$id)->first(); 

        

        if(!empty($chk)){
               
            return redirect()->back()->with('error','You can not delete this publisher it is in use');
        }

        else{
            
           if(!empty($removepub))
            {
             
            $removepub->delete();
            } 
            return redirect()->route('publishers.list')->with('success','Publisher is removed successfully'); 
        }

        
    }

    
}
