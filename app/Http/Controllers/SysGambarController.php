<?php

namespace App\Http\Controllers;

use App\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SysGambarController extends Controller
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
            'id' => 'required|integer|min:1',
            'tipe' => 'required|string',
            'nama' => 'required|string',
            'gambar' => 'mimes:jpeg,png,jpg', 
        ]);

        DB::beginTransaction();

        try {
            
            if($request->file('gambar')){
                $file = $request->file('gambar');
                
                $name_ex = date('YmdHis').'.'.$file->getClientOriginalExtension();
                $extention = $file->getClientOriginalExtension();
                $file->move(public_path('images/'.$request->tipe.'/'),$name_ex);
                $url = url("images/".$request->tipe."/".$name_ex);

                Gambar::create([
                    'id_ref' => $request->id,
                    'type' => $request->tipe,
                    'is_thumb' => 0,
                    'url' => $url,
                    'gambar' => $name_ex,
                    'name' => $request->nama
                ]);
            }

            DB::commit();

            return redirect()->back()->with('flash','Gambar telah terupload');
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
    public function update(Request $request, Gambar $gambar)
    {
        DB::beginTransaction();

        try {
              
                $gambar->update([
                    'is_thumb' => 1,
                ]);

            DB::commit();

            return redirect()->back()->with('flash','Status gambar telah diperbaharui');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('flash','Terjadi kesalahan penginputan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gambar $gambar)
    {
        DB::beginTransaction();

        try {
                $gambar->delete();

            DB::commit();

            return redirect()->back()->with('flash','Gambar telah dihapus');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('flash','Terjadi kesalahan penginputan');
        }
    }
}
