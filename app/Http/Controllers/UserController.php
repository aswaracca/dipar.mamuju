<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user = User::where('username','!=','superadmin')->get();
        return view('sys_user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sys_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,$this->getValidation());
        
        DB::beginTransaction();
        try {
            if($request->password == $request->confirm)       
                $data = User::create([
                    'name' => $request->name,
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                ]);
            else
                return redirect()->back()->with('error','Password tidak sama');
                
            DB::commit();
            return redirect()->route('user.index')->with('flash','Data Admin telah berhasil diinput');

        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('user.index')->with('error','Terjadi kesalahan penginputan');
        }
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {   
        return $user;
    }


    public function edit(User $user)
    {   
        return view('sys_user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       $this->validate($request,[
            'name' => 'required|string',
            'password' => 'nullable|min:6|max:32',
            'confirm' => 'nullable|min:6|max:32',
       ]);
        
        DB::beginTransaction();
        try {
            if(isset($request->password) && $request->password == $request->confirm)       
                $data = $user->update([
                    'name' => $request->name,
                    'password' => bcrypt($request->password),
                ]);
            else
                $data = $user->update([
                    'name' => $request->name,
                ]);
                
            DB::commit();
            return redirect()->route('user.index')->with('flash','Data Admin telah diperbaharui');

        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('user.index')->with('error','Terjadi kesalahan penginputan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();
            return response('success', 200);

        } catch (\Exception $e) {
            DB::rollback();

            return response('error', 500);
        }
    }

    public function getValidation(){
        return [
            'name' => 'string|required',
            'username' => 'required|min:6|max:32|unique:users',
            'password' => 'required|min:6|max:32',
            'confirm' => 'required|min:6|max:32',
        ];
    }
}
