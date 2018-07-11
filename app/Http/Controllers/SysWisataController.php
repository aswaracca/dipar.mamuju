<?php

namespace App\Http\Controllers;

use App\Wisata;
use App\WisataKategori;
use App\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SysWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = Wisata::all();
        $wisata->load('kategori');

        return view('sys_wisata.index',compact('wisata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = WisataKategori::all();
        return view('sys_wisata.create',compact('kategori'));
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
            
            $wisata = Wisata::create($request->all());

            DB::commit();

            return redirect(route('wisata.show',['wisata' => $wisata->id]))->with('flash','Data Wisata telah ditambahkan');
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
        $wisata = Wisata::findOrFail($id);
        // return $wisata->gambar;
        return view('sys_wisata.show',compact('wisata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        $kategori = WisataKategori::all();
        return view('sys_wisata.edit',compact('kategori','wisata'));
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
            
        
            $wisata = Wisata::findOrFail($id);
            $wisata->update($request->all());

            DB::commit();

            return redirect(route('wisata.show',['wisata' => $wisata->id]))->with('flash','Data Wisata telah diperbaharui');
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
    public function destroy(Wisata $wisatum)
    {

        DB::beginTransaction();

        try {
            foreach($wisatum->gambar as $gambar){
                if(file_exists('images/'.$gambar->type.'/'.$gambar->gambar)){
                    $filename = public_path('images/'.$gambar->type.'/'.$gambar->gambar);
                    unlink($filename);
                }
            }
        
            $wisatum->delete();

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
