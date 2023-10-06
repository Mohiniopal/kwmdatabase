<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kwm_rep_req;
use DB;


class kwm_rep_req_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('kwm_rep_req_old')->get();

        foreach($data as $d)
        {
            $data1=kwm_rep_req::where('id','=',$d->id)->first();

            if($data1)
            {
                $bgcareer = kwm_rep_req::find($d->id);
                $bgcareer->cus_id = $d->cus_id;
                $bgcareer->car_id = $d->car_id;
                $bgcareer->type = $d->type;
                $bgcareer->reason = $d->reason;
                $bgcareer->apdate = $d->apdate;
                $bgcareer->prfslot = $d->prfslot;
                $bgcareer->datetime = $d->datetime;
                $bgcareer->status = $d->status;
                $bgcareer->attend_by = $d->attend_by;
                $bgcareer->updated_at = date("Y-m-d h:i:sa");
                $bgcareer->save();
            }else{
                $bgcareer = new kwm_rep_req;
                $bgcareer->id = $d->id;
                $bgcareer->cus_id = $d->cus_id;
                $bgcareer->car_id = $d->car_id;
                $bgcareer->type = $d->type;
                $bgcareer->reason = $d->reason;
                $bgcareer->apdate = $d->apdate;
                $bgcareer->prfslot = $d->prfslot;
                $bgcareer->datetime = $d->datetime;
                $bgcareer->status = $d->status;
                $bgcareer->attend_by = $d->attend_by;
               
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
