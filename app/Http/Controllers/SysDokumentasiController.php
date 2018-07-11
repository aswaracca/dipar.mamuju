<?php

namespace App\Http\Controllers;

use App\Dokumentasi;
use App\DokumentasiKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SysDokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumentasi = Dokumentasi::all();
        $dokumentasi->load('kategori');

        return view('sys_dokumentasi.index',compact('dokumentasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DokumentasiKategori::all();
        return view('sys_dokumentasi.create',compact('kategori'));
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

            $dokumentasi = [];
            if($request->file('video')){
                $file = $request->file('video');
                
                $name_ex = date('YmdHis').'.'.$file->getClientOriginalExtension();
                $extention = $file->getClientOriginalExtension();
                $file->move(public_path('images/dokumentasi/'),$name_ex);
                $url = url("images/dokumentasi/".$name_ex);

                $dokumentasi = Dokumentasi::create([
                    'id_kategori' => $request->id_kategori,
                    'name' => $request->name,
                    'video' => $url,
                    'name_ex' => $name_ex,
                    'date' => $request->date,
                ]);
            }
            

            DB::commit();

            return redirect(route('dokumentasi.show',['dokumentasi' => $dokumentasi->id]))->with('flash','Data Dokumentasi telah ditambahkan');
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
        $dokumentasi = Dokumentasi::findOrFail($id);
        return view('sys_dokumentasi.show',compact('dokumentasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        $kategori = DokumentasiKategori::all();
        return view('sys_dokumentasi.edit',compact('kategori','dokumentasi'));
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
        // return $request->all();

        DB::beginTransaction();

        try {

        
            $dokumentasi = Dokumentasi::findOrFail($id);
            if($request->file('video')){
                if(file_exists('images/dokumentasi/'.$dokumentasi->name_ex)){
                    $filename = public_path('images/dokumentasi/'.$dokumentasi->name_ex);
                    unlink($filename);
                }

                $file = $request->file('video');
                
                $name_ex = date('YmdHis').'.'.$file->getClientOriginalExtension();
             
                $extention = $file->getClientOriginalExtension();
                $file->move(public_path('images/dokumentasi/'),$name_ex);
                $url = url("images/dokumentasi/".$name_ex);

                $dokumentasi->update([
                    'id_kategori' => $request->id_kategori,
                    'name' => $request->name,
                    'video' => $url,
                    'name_ex' => $name_ex,
                    'date' => $request->date,
                ]);
            }else{
                $dokumentasi->update([
                    'id_kategori' => $request->id_kategori,
                    'name' => $request->name,
                    'date' => $request->date,
                ]);
            }
            

            DB::commit();

            return redirect(route('dokumentasi.show',['dokumentasi' => $dokumentasi->id]))->with('flash','Data Dokumentasi telah diperbaharui');
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
    public function destroy(Dokumentasi $dokumentasi)
    {

        DB::beginTransaction();

        try {
            if(file_exists('images/dokumentasi/'.$dokumentasi->name_ex)){
                $filename = public_path('images/dokumentasi/'.$dokumentasi->name_ex);
                unlink($filename);
            }
    
            $dokumentasi->delete();

            DB::commit();

            return response('success',200);
        } catch (\Exception $e) {
            DB::rollback();

            return response('error',500);
        }
    }

    private function setValidation(){
        return [
            'id_kategori' => 'required|integer|min:1',
            'name' => 'required|string|max:254',
            'date' => 'required|date',
        ];
    }
}
