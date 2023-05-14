<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        if(count($countries)==0){
            return response()->json(['message'=>"request Successfully"],200); 
        }
        return response()->json(['message'=>"request Successfully", 'data'=>$countries],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          //
        $validator =Validator::make($request->all(),[
            'name'=>'required|max:150',
        ]);
        if ($validator->fails()){
            return $validator->errors();
        }
        $post = Country::create($validator->validated());
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    
    // {
    //     $countries = Country::find($id)->Countries;
    //     // return response()->json(["message"=>"show country by user id = ".$id." success", 'data'=>$countries],200);
    //     return response()->json(['data'=>$countries],200);
    // }
    public function show($id)
    {
        $countries = Country::find($id)->Countries;
        return response()->json(['message'=>"show by id Successfully", 'data'=>$countries],200);

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $countries = Country::find($id);
        $validator =Validator::make($request->all(),[
            'name'=>'required|max:150',
        ]);
        if ($validator->fails()){
            return $validator->errors();
        }else{
            $countries->update([
                'name'=>request('name'),
            ]);
        }
        return response()->json(["message"=>"show post by user id = ".$id." was update", 'data'=>$countries],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $countries = Country::find($id);
        $countries->delete();
        return response()->json(['message' =>"deleted successfully"],201);

    }
}
