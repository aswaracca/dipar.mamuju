<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SysHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel = Hotel::all();
        return view('sys_hotel.index', compact('hotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sys_hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,$this->setValidation());


        DB::beginTransaction();

        try {
            
            $hotel = Hotel::create($request->all());

            DB::commit();

            return redirect(route('hotel.show',['hotel' => $hotel->id]))->with('flash','Data hotel telah ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('flash','Terjadi kesalahan penginputan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return view('sys_hotel.show',compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('sys_hotel.edit', compact('hotel'));
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
    public function destroy(Hotel $hotel)
    {
        DB::beginTransaction();

        try {
            foreach($hotel->gambar as $gambar){
                if(file_exists('images/'.$gambar->type.'/'.$gambar->gambar)){
                    $filename = public_path('images/'.$gambar->type.'/'.$gambar->gambar);
                    unlink($filename);
                }
            }
        
            $hotel->delete();

            DB::commit();

            return response('success',200);
        } catch (\Exception $e) {
            DB::rollback();

            return response('error',500);
        }
    }

    public function setValidation(){
        return [
            'name' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string'
        ];
    }
}
