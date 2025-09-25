<?php

namespace App\Http\Controllers;

use App\Models\HelpRequest;
use Illuminate\Http\Request;

class HelpRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $helpRequests = $request->user()->helpRequests()->orderBy('id', 'desc')->get();

        return response()->json($helpRequests);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $helpRequest = new HelpRequest();
        $helpRequest->client_id = $request->user()->id;
        $helpRequest->description = $request->input('description');
        $helpRequest->address = $request->input('address');
        $helpRequest->longitude = $request->input('lng');
        $helpRequest->latitude = $request->input('lat');
        $helpRequest->save();

        return response()->json($helpRequest);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
