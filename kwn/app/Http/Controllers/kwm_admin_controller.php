<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_admin;
use DB;

class kwm_admin_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kwm_admin_old')->get();

        foreach($data as $d)
        {

            $data1 = kwm_admin::where('email','=',$d->email)->first();

            if($data1)
            {
                $admin =kwm_admin::where('email','=',$d->email)->first();
                $admin->email = $d->email;
                $admin->username = $d->username;
                $admin->password = $d->password;
                $admin->hash = $d->hash;
                $admin->status = $d->status;
                $admin->updated_at = date("Y-m-d h:i:sa");
                $admin->save();
            }else{
                $admin = new kwm_admin;
                $admin->id = $d->id;
                $admin->email = $d->email;
                $admin->username = $d->username;
                $admin->password = $d->password;
                $admin->hash = $d->hash;
                $admin->status = $d->status;
    
                $res=$admin->save();
            }

            

            print_r($admin);
            ini_set('max_execution_time', 300);
        }
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
