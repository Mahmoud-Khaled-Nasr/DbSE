<?php

namespace App\Http\Controllers;

use App\WSO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WSOController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! WSO::isWSOExists($id)){
            return response()->json(["error"=>"wrong id"],409);
        }
        $res= array_merge(WSO::all()->find($id)->toArray(), User::all()->find(WSO::all()->find($id)->user->id)->toArray());
        return response()->json($res,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
