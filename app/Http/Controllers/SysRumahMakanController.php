<?php

namespace App\Http\Controllers;

use App\RumahMakan;
use App\RumahMakanKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SysRumahMakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rm = RumahMakan::all();
        $rm->load('kategori');

        return view('sys_rumah_makan.index',compact('rm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = RumahMakanKategori::all();
        return view('sys_rumah_makan.create',compact('kategori'));
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
            
            $rm = RumahMakan::create($request->all());

            DB::commit();

            return redirect(route('rumah-makan.show',['rumah_makan' => $rm->id]))->with('flash','Data Rumah Makan telah ditambahkan');
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
        $rm = RumahMakan::findOrFail($id);
        return view('sys_rumah_makan.show',compact('rm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rm = RumahMakan::findOrFail($id);
        $kategori = RumahMakanKategori::all();
        return view('sys_rumah_makan.edit',compact('kategori','rm'));
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
        $this->validate($request,$this->setValidation());

        DB::beginTransaction();

        try {
            
        
            $rm = RumahMakan::findOrFail($id);
            $rm->update($request->all());

            DB::commit();

            return redirect(route('rumah-makan.show',['rumah_makan' => $rm->id]))->with('flash','Data Rumah Makan telah diperbaharui');
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
    public function destroy(RumahMakan $rumah_makan)
    {

        DB::beginTransaction();

        try {
            foreach($rumah_makan->gambar as $gambar){
                if(file_exists('images/'.$gambar->type.'/'.$gambar->gambar)){
                    $filename = public_path('images/'.$gambar->type.'/'.$gambar->gambar);
                    unlink($filename);
                }
            }
        
            $rumah_makan->delete();

            DB::commit();

            return response('success',200);
        } catch (\Exception $e) {
            DB::rollback();

            return response('error',500);
        }
    }

    private function setValidation(){
        return [
            'id_kategori' => 'required',
            'name' => 'required',
            'location' => 'required',
            'description' => 'required',
        ];
    }
}
