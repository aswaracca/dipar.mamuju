<?php

namespace App\Http\Controllers;

use App\Wisata;
use App\Hotel;
use App\RumahMakan;
use App\Dokumentasi;

use Illuminate\Http\Request;

class HomePencarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->search)){
            $pencarian = $request->search;

            $wisata = Wisata::where('name','LIKE',"%{$pencarian}%")->get();
            $wisata->load('gambarUtama','kategori');

            $hotel = Hotel::where('name','LIKE',"%{$pencarian}%")->get();
            $hotel->load('gambarUtama');

            $rumahMakan = RumahMakan::where('name','LIKE',"%{$pencarian}%")->get();
            $rumahMakan->load('gambarUtama','kategori');

            $dokumentasi = Dokumentasi::where('name','LIKE',"%{$pencarian}%")->get();
            $dokumentasi->load('kategori');


            return view('home_pencarian.show',compact('wisata','hotel','rumahMakan','dokumentasi'));
            
        }

        return view('home_pencarian.index');
        
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
        return view('home_pencarian.show');
        
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
