<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/**
 * Class EmailVerificationController
 *
 * @package App\Http\Controllers
 */

/*
 * TODO
 * the idea is to store the emails that waiting to be verified and create a random code and send it by email
 * then after the verification the email is removed from the table
 */
class EmailVerificationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
