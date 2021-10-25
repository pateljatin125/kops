<?php

namespace App\Http\Controllers\admin;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function reviewrequestssent()
    {
        //DB::enableQueryLog();
        $reviewrequestssent = DB::table('review_requests')->paginate(50);
        //dd(DB::getQueryLog());
        return view('admin.reviewrequestssent', ['reviewrequestssent' => $reviewrequestssent]);
    }
    public function reviewsgiven()
    {
        //DB::enableQueryLog();
        $reviewsgiven = DB::table('reviews as r')
        ->select('r.*','rr.request_phone','rr.request_email')
        ->join('review_requests as rr','r.requestId','=','rr.id')
        ->paginate(50);
        //$reviewsgiven = DB::table('reviews')->paginate(50);
        //dd(DB::getQueryLog());
        return view('admin.reviewsgiven', ['reviewsgiven' => $reviewsgiven]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
