<?php

namespace App\Http\Controllers;

use App\RumahMakanKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SysKategoriRMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RumahMakanKategori::all();
        return view('sys_rumah_makan_kategori.index',compact('data'));
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
        $this->validate($request,[
            'name' => 'required|string'
        ]);

        DB::beginTransaction();

        try {
            
            RumahMakanKategori::create([
                'name' => $request->name,
            ]);

            DB::commit();

            return redirect()->back()->with('flash','Data Kategori Rumah Makan telah ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error','Terjadi kesalahan penginputan');
        }
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
    public function destroy(RumahMakanKategori $kategori_rumah_makan)
    {
        DB::beginTransaction();

        try {
            
            $kategori_rumah_makan->delete();

            DB::commit();
            return response('success',200);

        } catch (\Exception $e) {
            DB::rollback();

            return response('error',500);
        }
    }
}
