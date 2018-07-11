<?php

namespace App\Http\Controllers;

use App\DokumentasiKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SysKategoriDokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DokumentasiKategori::all();
        return view('sys_dokumentasi_kategori.index',compact('data'));
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
            
            DokumentasiKategori::create([
                'name' => $request->name,
            ]);

            DB::commit();

            return redirect()->back()->with('flash','Data Kategori Dokumentasi telah ditambahkan');
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
    public function destroy(DokumentasiKategori $kategori_dokumentasi)
    {
        DB::beginTransaction();

        try {
            
            $kategori_dokumentasi->delete();

            DB::commit();
            return response('success',200);

        } catch (\Exception $e) {
            DB::rollback();

            return response('error',500);
        }
    }
}
