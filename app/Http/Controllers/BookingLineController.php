<?php

namespace App\Http\Controllers;

use App\Models\BookingLine;
use Illuminate\Http\Request;

class BookingLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bookingLines = BookingLine::simplePaginate(8,['id','date','status']);
        return view('bookingLines', ['bookingLines' => $bookingLines]);
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
     * @param  \App\Models\BookingLine  $bookingLine
     * @return \Illuminate\Http\Response
     */
    public function show(BookingLine $bookingLine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingLine  $bookingLine
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingLine $bookingLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingLine  $bookingLine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingLine $bookingLine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingLine  $bookingLine
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingLine $bookingLine)
    {
        //
    }
}
