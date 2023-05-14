<?php

namespace App\Http\Controllers;
use App\Models\Venues;

use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venues::all();
        if(count($venues)==0){
            return response()->json(['message'=>"request Successfully"],200); 
        }
        return response()->json(['message'=>"request Successfully", 'data'=>$venues],200);
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
        $validator =Validator::make($request->all(),[
            'location'=>'required|max:500',
        ]);
        if ($validator->fails()){
            return $validator->errors();
        }
        $post = Venues::create($validator->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
