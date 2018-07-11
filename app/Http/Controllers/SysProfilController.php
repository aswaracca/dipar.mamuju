<?php

namespace App\Http\Controllers;

use App\Profil;
use App\Dokumentasi;
use Illuminate\Http\Request;

class SysProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::findOrFail(1);
        $dokumentasi = Dokumentasi::all();
        return view('sys_profil.index',compact('profil','dokumentasi'));
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
    public function update(Request $request, Profil $profil)
    {
        $this->validate($request,[
            'id_dokumentasi' => 'required',
            'vision' => 'required',
            'about' =>'required',
        ]);

        if($request->file('image')){
            if(file_exists('images/profil/'.$profil->name_ex)){
                $filename = public_path('images/profil/'.$profil->name_ex);
                unlink($filename);
            }

            $file = $request->file('image');
            $name_ex = date('YmdHis').'.'.$file->getClientOriginalExtension();
            $extention = $file->getClientOriginalExtension();
            $file->move(public_path('images/profil/'),$name_ex);
            $url = url("images/profil/".$name_ex);

            $profil->update([
                'id_dokumentasi' =>$request->id_dokumentasi,
                'vision' =>$request->vision,
                'about' =>$request->about,
                'image' =>$url,
                'name_ex' =>$name_ex,
            ]);
        }else
            $profil->update([
                'id_dokumentasi' =>$request->id_dokumentasi,
                'vision' =>$request->vision,
                'about' =>$request->about,
            ]);

        return redirect()->back()->with('flash','Berhasil memperbaharui profil');

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
