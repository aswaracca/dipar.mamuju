<?php

namespace App\Http\Controllers;

use App\Profil;
use App\Wisata;
use App\Hotel;
use App\RumahMakan;

use Illuminate\Http\Request;

class HomeBerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::findOrFail(1);
        $profil->load('dokumentasi');

        $wisata = Wisata::limit(3)->orderBy('id','desc')->get();
        $wisata->load('gambarUtama');
// return $wisata;
        $hotel = Hotel::limit(3)->orderBy('id','desc')->get();
        $hotel->load('gambarUtama');

        $rm = RumahMakan::limit(3)->orderBy('id','desc')->get();
        $rm->load('gambarUtama');

        return view('home_beranda.index',compact('profil','wisata','hotel','rm'));
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
