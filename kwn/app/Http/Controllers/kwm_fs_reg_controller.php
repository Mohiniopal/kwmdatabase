<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_fs_reg;
use DB;

class kwm_fs_reg_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kwm_fs_reg_old')->get();

        foreach($data as $d)
        {
            $data1=kwm_fs_reg::where('id','=',$d->id)->first();

            if($data1)
            {
                $bgcareer = kwm_fs_reg::find($d->id);
                $bgcareer->fs_id = $d->fs_id;
                $bgcareer->fs_pin = $d->fs_pin;
                $bgcareer->fs_expiry_date = $d->fs_expiry_date;
                $bgcareer->debtor_pin = $d->debtor_pin;
                $bgcareer->billing_txn_no = $d->billing_txn_no;
                $bgcareer->updated_at = date("Y-m-d h:i:sa");
                $bgcareer->save();
            }else{
                $bgcareer = new kwm_fs_reg;
                $bgcareer->id = $d->id;
                $bgcareer->fs_id = $d->fs_id;
                $bgcareer->fs_pin = $d->fs_pin;
                $bgcareer->fs_expiry_date = $d->fs_expiry_date;
                $bgcareer->debtor_pin = $d->debtor_pin;
                $bgcareer->billing_txn_no = $d->billing_txn_no;
               
                $res=$bgcareer->save();
            }
            

            print_r($bgcareer);
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
