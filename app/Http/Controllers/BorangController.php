<?php

namespace App\Http\Controllers;

use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\Borang;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BorangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borang = DB::table('customers')->get();
   
        return view('borang/index', compact('borang'));
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
     * @param  \App\Models\Borang  $borang
     * @return \Illuminate\Http\Response
     */
    public function show(Borang $borang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borang  $borang
     * @return \Illuminate\Http\Response
     */
    public function edit(Borang $borang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borang  $borang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borang $borang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borang  $borang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borang $borang)
    {
        //
    }

    public function url($code)
    {
        if(isset($code))
        {
            $find = DB::table('customers')->where('phone_number', $code)->first();
        }
        else
        {
            $find = '';
        }

        // dd($find);
        return $this->borang($find);
    }

    public function borang($data)
    {
        $borang = $data;

        return view('borang/borang_pesanan', compact('borang'));
    }
}
